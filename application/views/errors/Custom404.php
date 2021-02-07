<div class="main-content-container container-fluid p-5 text-center">
    <i class="far fa-frown fa-5x text-secondary"></i>
    <h1 class="text-secondary mt-3">404</h1>
    <h5 class="text-secondary mt-2">PAGE NOT FOUND</h5>
    <?php if ($this->session->userdata('login')) {
        echo '<a href="'.base_url('dashboard').'"><i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard</a>';
    } else {
        echo '<a href="'.base_url('/').'"><i class="fas fa-arrow-left mr-2"></i> Kembali ke Login</a>';
    }
    ?>
</div>