<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script>
    $(document).ready(function() {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'Sucesso!',
            text: '<?php echo $message; ?>',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            width: '300px',
            padding: '10px'
        });
    });
</script>

