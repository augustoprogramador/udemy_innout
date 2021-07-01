        <aside class="sidebar">
            <nav class="menu mt-3">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="day_records.php">
                            <i class="icofont-ui-check mr-2"></i>
                            Registrar Ponto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=".php">
                            <i class="icofont-ui-calendar mr-2"></i>
                            Relatório Mensal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=".php">
                            <i class="icofont-chart-histogram mr-2"></i>
                            Relatório Gerencial
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=".php">
                            <i class="icofont-users mr-2"></i>
                            Usuários
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="sidebar-widgets">
                <div class="sidebar-widget">
                    <i class=" text-primary icon icofont-hour-glass"></i>
                    <div class="info">
                        <span class="main text-primary"
                                <?php echo $activeClock == 'workedInterval' ? 'active-clock' : '' ?>
                        >
                            <?php echo $workedInterval ?>
                        </span>
                        <span class="label text-muted">Horas Trabalhadas</span>
                    </div>
                </div>

                <div class="division my-3"></div>

                <div class="sidebar-widget">
                    <i class=" text-danger icon icofont-ui-alarm"></i>
                    <div class="info">
                        <span class="main text-danger"
                                <?php echo $activeClock == 'exitTime' ? 'active-clock' : '' ?>
                        >
                            <?php echo $exitTime ?>
                        </span>
                        <span class="label text-muted">Hora de Saída</span>
                    </div>
                </div>
            </div>
        </aside>