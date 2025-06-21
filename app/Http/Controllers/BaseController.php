<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    /**
     * Trả về một JSON response chứa thông báo lỗi và mã trạng thái.
     *
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($message, $status): JsonResponse
    {
        return response()->json(['error' => ['message' => $message]], $status);
    }

    /**
     * Trả về một JSON response chứa thông báo lỗi và mã trạng thái.
     *
     * @param string $message
     * @param int $status
     * @param mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorData($message, $status, $data): JsonResponse
    {
        return response()->json(['error' => $data, 'message' => $message], $status);
    }

    /**
     * Trả về một JSON response khi xóa một nguồn tài nguyên.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function displayDeleted(): JsonResponse
    {
        return response()->json(['message' => __('notification.delete_success')], Response::HTTP_OK);
    }

    /**
     * Trả về một JSON response khi bị cấm truy cập.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function forbidden(): JsonResponse
    {
        return response()->json(['message' => __('notification.forbidden')], Response::HTTP_FORBIDDEN);
    }

    /**
     * Trả về một JSON response khi không tìm thấy.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function notFound(): JsonResponse
    {
        return response()->json(['message' => __('notification.not_found')], Response::HTTP_NOT_FOUND);
    }

    /**
     * Trả về một JSON response khi thiếu tải tệp.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fileUploadMissing(): JsonResponse
    {
        return $this->error(__('notification.file_upload_missing'), Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Trả về một JSON response khi Header Content-Type không hợp lệ.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function displayInvalidContentType(): JsonResponse
    {
        return $this->error('Invalid Content-Type header', Response::HTTP_UNSUPPORTED_MEDIA_TYPE);
    }

    /**
     * Trả về một JSON response khi không có dữ liệu.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function noData(): JsonResponse
    {
        return response()->json(['message' => __('notification.no_data'), 'data' => []], Response::HTTP_OK);
    }

    /**
     * Trả về một mảng chứa thông báo thành công khi truy vấn dữ liệu thành công.
     *
     * @return array
     */
    public function displayMessageSuccess(): array
    {
        return ['message' => __('notification.retrieve_success')];
    }

    /**
     * Trả về một mảng chứa thông báo khi tạo thành công.
     *
     * @return array
     */
    public function displayMessageStore(): array
    {
        return ['message' => __('notification.create_success')];
    }

    /**
     * Trả về một mảng chứa thông báo khi cập nhật thành công.
     *
     * @return array
     */
    public function displayMessageUpdate(): array
    {
        return ['message' => __('notification.update_success')];
    }

    /**
     * Upload file.
     *
     * @param mixed $file
     * @param string $hashName
     * @param string $localPath
     * @return string
     */
    public function __uploadFile($file, $hashName, $localPath): string
    {
        if (!file_exists(public_path($localPath))) {
            mkdir(public_path($localPath), 0755, true);
        }

        $fileUploadPath = $localPath . '/' . $hashName;
        $realPath = $file->getRealPath();

        move_uploaded_file($realPath, $fileUploadPath);

        return $fileUploadPath;
    }

    /**
     * Trả về json response khi không tồn tại user. Trả về mã trạng thái 401 Unauthorized.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userNotFound(): JsonResponse
    {
        return response()->json(['message' => __('notification.authentication_error')], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Trả về json 500 response khi có lỗi máy chủ nội bộ.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function internalServerError(): JsonResponse
    {
        return response()->json(['message' => __('notification.500')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
