<?php
require_once(__DIR__ . '/../auth/access.php');
$title = $my_name;

include_once(__DIR__ . '/../inc/header.php');

?>

<div class="row col-10 rounded mx-auto mt-1">
    <h2 colspan="" class="text-center">My Profile</h2>
        <div class="col-md-3 text-center">
            <img src="../info/image/profile1.png" alt="profile-pic" />
        </div>
        <div class="col-md-8">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th><i class="bi bi-file-person-fill"></i>Name</th>
                        <td>
                            <?= $my_name ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-telephone"></i>
                            Phone number</th>
                        <td>
                            <?= $my_phone ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-envelope-at"></i>
                            Email</th>
                        <td>
                            <?= $my_email ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-signpost-split"></i>
                            Occupation</th>
                        <td>
                            <?= $my_occupation ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-signpost-split"></i>
                            State</th>
                        <td>
                            <?= $my_state ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-signpost-split"></i>
                            Local Govt. Area</th>
                        <td>
                            <?= $my_lga ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-signpost-split"></i>
                            Language</th>
                        <td>
                            <?= $my_language ?>
                        </td>
                    </tr>


                </tbody>

            </table>
            <div class="text-center">
                <a href="edit_profile.php" class="btn btn-secondary"><i class="bi bi-pencil-square"></i>Edit
                    Profile</a>
            </div>
        </div>

</div>


<?php
include_once(__DIR__ . '/../inc/footer.php');
?>