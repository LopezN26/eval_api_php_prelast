<?php
declare(strict_types=1);

namespace App\Application\Actions\JobDating;

use Psr\Http\Message\ResponseInterface as Response;

class ListJobDatingAction extends JobDatingActionAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobDatings = $this->jobDatingRepository->findAll();

        $this->logger->info("Job Datings list was viewed.");

        return $this->respondWithData($jobDatings);
    }
}
