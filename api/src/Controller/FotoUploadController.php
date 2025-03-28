<?php

namespace App\Controller;

use App\Repository\PessoaRepository;
use App\Service\FotoUploaderService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class FotoUploadController extends AbstractController
{
    private FotoUploaderService $fotoUploader;
    private PessoaRepository $pessoaRepository;
    private FotoUploaderService $fotoUploaderService;

    public function __construct(FotoUploaderService $fotoUploader,
        PessoaRepository $pessoaRepository,
        FotoUploaderService $fotoUploaderService)
    {
        $this->fotoUploader = $fotoUploader;
        $this->pessoaRepository = $pessoaRepository;
        $this->fotoUploaderService = $fotoUploaderService;
    }

    #[Route('/upload/{pessoaId}', name: 'upload_foto', methods: ['POST'])]
    public function __invoke(Request $request, int $pessoaId): JsonResponse
    {
        $file = $request->files->get('file');

        if (!$file instanceof UploadedFile) {
            throw new BadRequestHttpException('Arquivo inválido.');
        }


        if (!$file) {
            throw new BadRequestHttpException('Nenhum arquivo enviado.');
        }

        try {
            $pessoa = $this->pessoaRepository->find($pessoaId);

            if (!$pessoa) {
                return $this->json(['error' => 'Pessoa não encontrada.'], Response::HTTP_NOT_FOUND);
            }

            // Chama o serviço para fazer o upload e persistir a foto
            $fotoPessoa = $this->fotoUploaderService->upload($file, $pessoa);

            // Retorna uma resposta com o sucesso da operação
            return $this->json([
                'message' => 'Upload realizado com sucesso!',
                'foto_id' => $fotoPessoa->getId(),
                'file_path' => $fotoPessoa->getDtHash(),
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            // Caso ocorra erro, retorna a mensagem de erro
            return $this->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
