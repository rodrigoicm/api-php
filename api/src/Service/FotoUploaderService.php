<?php
namespace App\Service;

use RuntimeException;
use App\Entity\Pessoa;
use DateTimeImmutable;
use App\Entity\FotoPessoa;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\EntityManagerInterface;
use League\Flysystem\FilesystemOperator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FotoUploaderService
{
    private FilesystemOperator $storage;
    private EntityManagerInterface $entityManager;
    private string $bucket;

    public function __construct(
        FilesystemOperator $storage,
        EntityManagerInterface $entityManager,
        string $bucket)
    {
        $this->storage = $storage;
        $this->entityManager = $entityManager;
        $this->bucket = $bucket;
    }

    public function upload(UploadedFile $file, Pessoa $pessoa): FotoPessoa
    {
       // Validações adicionais
    $this->validateFile($file);

    $fileHash = Uuid::v4()->toRfc4122();
    $fileExtension = $file->guessExtension();
    $filePath = sprintf('uploads/%s.%s', $fileHash, $fileExtension);

    try {
        $stream = fopen($file->getPathname(), 'r');

        // Verificar se o stream foi aberto corretamente
        if ($stream === false) {
            throw new \RuntimeException('Não foi possível ler o arquivo.');
        }


        // Upload para MinIO
        $this->storage->writeStream($filePath, $stream);
        fclose($stream);

        $publicUrl = $this->generatePublicUrl($filePath);

        // Criar e persistir FotoPessoa
        $foto = new FotoPessoa();
        $foto->setPessoa($pessoa);
        $foto->setFtData(new DateTimeImmutable());
        $foto->setFtBucket($this->bucket);
        $foto->setDtHash($filePath);
        $foto->setUrl($publicUrl);

        $this->entityManager->persist($foto);
        $this->entityManager->flush();

        return $foto;
    } catch (\Exception $e) {
        // Log do erro
        throw new \RuntimeException('Erro no upload do arquivo: ' . $e->getMessage());
    }
    }

    private function validateFile(UploadedFile $file): void
    {
    // Validações de arquivo
    $maxFileSize = 5 * 1024 * 1024; // 5MB
    $allowedMimeTypes = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/webp'
    ];

    // Verifica tamanho do arquivo
    if ($file->getSize() > $maxFileSize) {
        throw new \InvalidArgumentException('Tamanho máximo do arquivo excedido (5MB).');
    }

    // Verifica tipo de arquivo
    if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
        throw new \InvalidArgumentException('Tipo de arquivo não permitido.');
    }


}
    private function generatePublicUrl(string $filePath): string
    {
        // Construir URL pública do MinIO
        return sprintf(
            '%s/%s/%s',
            rtrim($this->getEndpoint(), '/'),
            $this->bucket,
            $filePath
        );
    }

    private function getEndpoint(): string
    {
        return $_ENV['MINIO_ENDPOINT'];
    }
}
