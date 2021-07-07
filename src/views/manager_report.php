<main class="content">
    <?php 
        renderTitle(
            'Relatório gerencial',
            'Resumo das horas trabalhadas dos funcionários',
            'icofont-chart-histogram'
        )
    ?>

    <div class="sumary-boxes">
        <div class="sumary-box bg-primary">
            <i class="icon icofont-users"></i>
            <p class="title">Qtde de Funcionários</p>
            <h3 class="value"><?php echo $activeUsersCount ?></h3>
        </div>
        <div class="sumary-box bg-danger">
            <i class="icon icofont-patient-bed"></i>
            <p class="title">Faltas</p>
            <h3 class="value"><?php echo count($absentUsers) ?></h3>
        </div>
        <div class="sumary-box bg-success">
            <i class="icon icofont-sand-clock"></i>
            <p class="title">Horas no Mês</p>
            <h3 class="value"><?php echo $hoursInMonth ?></h3>
        </div>
    </div>

    <?php if(count($absentUsers) > 0): ?>
        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">Faltosos do Dia</div>
                <p class="card-category mb-0">Relação dos funcionários que ainda não bateram ponto.</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <th>Nome</th>
                    </thead>
                    <tbody>
                        <?php foreach($absentUsers as $name): ?>
                        <tr>
                            <td><?php echo $name ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    <?php endif; ?>
</main>