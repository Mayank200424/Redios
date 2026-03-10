<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('message')) {
    function message()
    {
        $html = '';

        if (Session::has('success')) {
            $html = '
        <div class="d-flex justify-content-center mb-2">
            <div class="alert alert-success text-center" style="width: 280px;">
                ' . Session::get('success') . '
            </div>
        </div>';
        }

        if (Session::has('error')) {
            $html = '
        <div class="d-flex justify-content-center mb-2">
            <div class="alert alert-danger text-center" style="width: 280px;">
                ' . Session::get('error') . '
            </div>
        </div>';
        }

        return $html;
    }
}

if (!function_exists('logoutModal')) {
    function logoutModal($logoutRoute)
    {
        return '
        <form id="logoutForm" method="POST" action="' . route($logoutRoute) . '">
            ' . csrf_field() . '
            <button type="button" class="dropdown-item text-danger" 
                data-bs-toggle="modal" data-bs-target="#logoutModal"
                style="border: none; background: none; width: 100%; text-align: left;">
                <i class="bx bx-log-out fs-18 align-middle me-1"></i><span class="align-middle">Logout</span>
            </button>
        </form>

        <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to logout?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-danger" id="confirmLogout">
                            Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("confirmLogout").addEventListener("click", function () {
                    document.getElementById("logoutForm").submit();
                });
            });
        </script>
        ';
    }
}

if (!function_exists('deleteModal')) {
    function deleteModal($modalId = 'deleteModal', $title = 'Delete product', $message = 'Are you sure you want to delete this product?', $formId = 'deleteForm')
    {
        return '
        <div class="modal fade" id="' . $modalId . '" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" id="' . $formId . '">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '

                        <div class="modal-header">
                            <h5 class="modal-title">' . $title . '</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            ' . $message . '
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>';
    }
}

if (!function_exists('toastMessage')) {

    function toastMessage()
    {
        if (session('success') || session('error')) {

            $message = session('success') ?? session('error');
            $color = session('success') ? '#FF8717' : '#dc3545';

            return '
            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div id="messageToast"
                     class="toast show align-items-center border-0"
                     style="width:300px; background-color: '.$color.'; color:white;">
                    <div class="d-flex">
                        <div class="toast-body">'.$message.'</div>
                        <button type="button"
                                class="btn-close btn-close-white me-2 m-auto"
                                data-bs-dismiss="toast"></button>
                    </div>
                </div>
            </div>

            <script>
                setTimeout(function () {
                    var toast = document.getElementById("messageToast");
                    if (toast) {
                        toast.style.display = "none";
                    }
                }, 3000);
            </script>
            ';
        }

        return '';
    }
}

?>