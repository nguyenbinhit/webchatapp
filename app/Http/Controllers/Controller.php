<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    /**
     * Trả về một JSON response chứa thông báo lỗi và mã trạng thái.
     *
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    abstract function error($message, $status): JsonResponse;

    /**
     * Trả về một JSON response khi xóa một nguồn tài nguyên.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    abstract function displayDeleted(): JsonResponse;

    /**
     * Trả về một JSON response khi bị cấm truy cập.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    abstract function forbidden(): JsonResponse;

    /**
     * Trả về một JSON response khi không tìm thấy.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    abstract function notFound(): JsonResponse;

    /**
     * Trả về một JSON response khi thiếu tải tệp.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    abstract function fileUploadMissing(): JsonResponse;
    /**
     * Trả về một JSON response khi Header Content-Type không hợp lệ.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    abstract function displayInvalidContentType(): JsonResponse;
    /**
     * Trả về một JSON response khi không có dữ liệu.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    abstract function noData(): JsonResponse;

    /**
     * Trả về một mảng chứa thông báo thành công khi truy vấn dữ liệu thành công.
     *
     * @return array
     */
    abstract function displayMessageSuccess(): array;

    /**
     * Trả về một mảng chứa thông báo khi tạo thành công.
     *
     * @return array
     */
    abstract function displayMessageStore(): array;

    /**
     * Trả về một mảng chứa thông báo khi cập nhật thành công.
     *
     * @return array
     */
    abstract function displayMessageUpdate(): array;

    /**
     * Upload file.
     *
     * @param mixed $file
     * @param string $hashName
     * @param string $localPath
     * @return string
     */
    abstract function __uploadFile($file, $hashName, $localPath): string;
}
