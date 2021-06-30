<?php

    $errors = [];

    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
        
    } else if ($exception) {
        $message = [
            'type' => 'error',
            'message' => $exception->getMessage()
        ];

        if (get_class($exception) === 'ValidationException')
        {
            $errors = $exception->getErrors();
        }
    }

    if ($message['type'] === 'error')
    {
        $alertType = 'danger';
    } else {
        $alertType = 'success';
    }
?>

<?php if($message): ?>
    <div class="alert alert-<?php echo $alertType ?> my-3" 
        role="alert">
        <?php echo $message['message'] ?>
    </div>
<?php endif; ?>

