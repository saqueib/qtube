<?php

namespace App\API;

use Illuminate\Http\Response;

trait ApiHelper
{

    /**
     * Return no content response
     *
     * @return $this
     */
    public function noContent()
    {
        $response = new Response();
        return $response->setStatusCode(204);
    }


    /**
     * Respond with a created response and associate a location if provided.
     *
     * @param null $location
     * @param null $content
     * @return Response
     */
    public function created($location = null, $content = null)
    {
        $response = new Response($content);
        $response->setStatusCode(201);
        if (! is_null($location)) {
            $response->header('Location', $location);
        }
        return $response;
    }

    /**
     * Return an error response.
     *
     * @param string $message
     * @param int    $statusCode
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function error($message, $statusCode)
    {
        return response()->json(['error' => $message], $statusCode);
    }

    /**
     * Return a 404 not found error.
     *
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function errorNotFound($message = 'Not Found')
    {
       return $this->error($message, 404);
    }

    /**
     * Return a 400 bad request error.
     *
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function errorBadRequest($message = 'Bad Request')
    {
       return $this->error($message, 400);
    }

    /**
     * Return a 403 forbidden error.
     *
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function errorForbidden($message = 'Forbidden')
    {
       return $this->error($message, 403);
    }

    /**
     * Return a 500 internal server error.
     *
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function errorInternal($message = 'Internal Error')
    {
        return $this->error($message, 500);
    }

    /**
     * Return a 401 unauthorized error.
     *
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function errorUnauthorized($message = 'Unauthorized')
    {
        return $this->error($message, 401);
    }

    /**
     * Return a 405 method not allowed error.
     *
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function errorMethodNotAllowed($message = 'Method Not Allowed')
    {
        return $this->error($message, 405);
    }
}