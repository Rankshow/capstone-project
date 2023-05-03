<?php
require_once(__DIR__ . '/auth/access.php');
include_once(__DIR__ . '/inc/header.php');
include_once(__DIR__ . '/inc/footer.php');

?>

<div class="row col-10 rounded mx-auto mt-1">
    <div class="col-md-3 text-center">
        <img src="/templates/images/profile1.png" alt="profile-pic"/>
    </div>
    <div class="col-md-8">
 <table class="table table-striped">
   <h2 colspan="2">My Profile</h2r>
    <tbody>
         <tr>
            <th><i class="bi bi-file-person-fill"></i>Name</th>
            <td>
                <?= $name ?>
            </td>
        </tr>
        <tr>
            <th><i class="bi bi-telephone"></i>
Phone number</th>
            <td>
                <?= $phone ?>
            </td>
        </tr>
        <tr>
            <th><i class="bi bi-envelope-at"></i>
Email</th>
            <td>
                <?= $email ?>
            </td>
        </tr>
        <tr>
            <th><i class="bi bi-signpost-split"></i>
Occupation</th>
            <td>
                <?= $occupation ?>
            </td>
        </tr>
        <tr>
            <th><i class="bi bi-signpost-split"></i>
State</th>
            <td>
                <?= $state ?>
            </td>
        </tr>
        <tr>
            <th><i class="bi bi-signpost-split"></i>
Local Govt. Area</th>
            <td>
                <?= $lga ?>
            </td>
        </tr>
        <tr>
            <th><i class="bi bi-signpost-split"></i>
Language</th>
            <td>
                <?= $language ?>
            </td>
        </tr>


    </tbody>

    </table>
    <div class="text-center">
    <a href="edit_profile.html.php" class="btn btn-secondary"><i class="bi bi-pencil-square"></i>Edit Profile</a>
    </div>
    </div>
   
</div>
