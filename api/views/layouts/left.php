<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php if (!Yii::$app->user->isGuest) {
                        echo Yii::$app->user->identity->username;
                    } ?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => '首页', 'icon' => 'dashboard', 'url' => ['site/index']],
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => "登陆页面", 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => '后台用户','icon' => 'fa fa-circle-o', 'url' => ['user-backend/index','class'=>'fa fa-gears'],
                        'items' => [
                            ['label' => '用户列表', 'icon' => 'file-code-o', 'url' => ['user-backend/index'],],
                            ['label' => '用户注册', 'icon' => 'dashboard', 'url' => ['user-backend/signup'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' =>['user-backend/signup'],],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],

                                    ],
                                ],
                            ],
                        ],],
//                    [
//                        'label' => 'Same tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                ],
            ]
        ) ?>
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>权限控制</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="/admin">管理员</a>
                        <ul class="treeview-menu">
                            <li><a href="/user"><i class="fa fa-circle-o"></i> 后台用户</a></li>
                            <li class="treeview">
                                <a href="/admin/role">
                                    <i class="fa fa-circle-o"></i> 权限 <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/admin/route"><i class="fa fa-circle-o"></i> 路由</a></li>
                                    <li><a href="/admin/permission"><i class="fa fa-circle-o"></i> 权限</a></li>
                                    <li><a href="/admin/role"><i class="fa fa-circle-o"></i> 角色</a></li>
                                    <li><a href="/admin/assignment"><i class="fa fa-circle-o"></i> 分配</a></li>
                                    <li><a href="/admin/menu"><i class="fa fa-circle-o"></i> 菜单</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </section>

</aside>
