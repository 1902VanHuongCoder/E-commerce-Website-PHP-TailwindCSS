<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Contacts</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <p class="animate__animated animate__fadeInLeft">View your all contacs here.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- FLASH MESSAGES -->

            <a href="/contacts/create" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i> New Contact</a>
            <!-- Table Ends Here -->
        </div>
    </div>
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>
