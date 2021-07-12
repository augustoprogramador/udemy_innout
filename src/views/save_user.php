<main class="content">
    <?php
        renderTitle(
            'Cadastro de Usuário',
            'Crie e atualize o usuário',
            'icofont-user'
        );

        include(TEMPLATE_PATH . '/messages.php');
    ?>

    <form action="#" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nome</label>
                <input 
                    type="text" 
                    class="form-control <?php echo $errors['name'] ? 'is-invalid' : '' ?>" 
                    id="name" 
                    name="name" 
                    placeholder=""
                    value="<?php echo $name ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['name'] ?>
                    </div>
            </div>
            <div class="form-group col-md-6">
                <label for="email">E-Mail</label>
                <input 
                    type="text" 
                    class="form-control <?php echo $errors['email'] ? 'is-invalid' : '' ?>" 
                    id="email" 
                    name="email" 
                    placeholder=""
                    value="<?php echo $email ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['email'] ?>
                    </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Senha</label>
                <input 
                    type="password" 
                    class="form-control <?php echo $errors['password'] ? 'is-invalid' : '' ?>" 
                    id="password" 
                    name="password" 
                    placeholder="">
                    <!-- value="<?php // echo $senha ?>"> -->
                    <div class="invalid-feedback">
                        <?php echo $errors['password'] ?>
                    </div>
            </div>
            <div class="form-group col-md-6">
                <label for="confirm_password">Confirmação de Senha</label>
                <input 
                    type="password" 
                    class="form-control <?php echo $errors['confirm_password'] ? 'is-invalid' : '' ?>" 
                    id="confirm_password" 
                    name="confirm_password" 
                    placeholder="">
                    <!-- value="<?php // echo $name ?>"> -->
                    <div class="invalid-feedback">
                        <?php echo $errors['confirm_password'] ?>
                    </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Data de Admissão</label>
                <input 
                    type="date" 
                    class="form-control <?php echo $errors['start_date'] ? 'is-invalid' : '' ?>" 
                    id="start_date" 
                    name="start_date" 
                    placeholder=""
                    value="<?php echo $start_date ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['start_date'] ?>
                    </div>
            </div>
            <div class="form-group col-md-6">
                <label for="end_date">Data de Desligamento</label>
                <input 
                    type="date" 
                    class="form-control <?php echo $errors['end_date'] ? 'is-invalid' : '' ?>" 
                    id="end_date" 
                    name="end_date" 
                    placeholder=""
                    value="<?php echo $end_date ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['end_date'] ?>
                    </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="is_admin">Administrador?</label>
                <div class="form-check">
                    <input
                        type="checkbox"
                        id="is_admin"
                        name="is_admin"
                        class="form-check-input <?php echo $errors['is_admin'] ? 'is-invalid' : '' ?>"
                        <?php echo $is_admin ? 'checked' : '' ?>>
                </div>
                <div class="invalid-feedback">
                    <?php echo $errors['is_admin'] ?>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary btn-lg">Salvar</button>
            <a href="/users.php" class="btn btn-secondary btn-lg">Cancelar</a>
        </div>
    </form>

</main>