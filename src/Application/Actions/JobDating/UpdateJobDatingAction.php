<?php
declare(strict_types=1);


namespace App\Application\Actions\JobDating;

use Psr\Http\Message\ResponseInterface as Response;

class UpdateJobDatingAction extends JobDatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobDatingId = (int) $this->resolveArg('id');

        $datas = $this->getFormData();
        /**
         * @var JobDating
         */
        $jobDating = $this->jobDatingRepository->findUserOfId($jobDatingId);
        /**
         * @var bool
         */
        $response = $jobDating->update($datas);

        $this->logger->info("User of id `${jobDatingId}` updated.");

        return $this->respondWithData(['status'=>$response, "user"=>$jobDating]);
    }
}