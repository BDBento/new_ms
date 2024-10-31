<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title>
        <?php
        // Se for FrontPage or Home
        if (is_home() || is_front_page()) {
            echo get_bloginfo('name') . ' - ' . get_bloginfo('description');
        } else {
            wp_title(' - ', true, 'right');
            echo bloginfo('name');
        }
        ?>
    </title>
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="author" content="bbento " />
    <meta name="robots" content="follow,all" />
    <meta http-equiv="Content-Language" content="pt-br" />
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png" type="image/png" />
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Titillium+Web:300,400,600,700"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700;900&display=swap" rel="stylesheet">
    <!-- // Font -->



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>



    <link id="bootstrap" rel="stylesheet" href="<?= get_template_directory_uri() . '/assets/css/bootstrap.min.css'; ?>"
        type="text/css" media="all">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link id="stylesheet" rel="stylesheet" href="<?= get_template_directory_uri() . '/assets/css/main.css'; ?>"
        type="text/css" media="all">


    <!--Para configurar postagens quando adicionadas no facebook -->
    <?php
    if (is_single()) {
        echo "<meta property='og:title' content='" . get_the_title() . "'>\n";
        echo "<meta property='og:description' content='" . get_the_excerpt() . "'>\n";
        echo "<meta property='og:image' content='" . get_the_post_thumbnail_url() . "'>\n";
        echo "<meta property='og:image:width' content='960' /> \n";
        echo "<meta property='og:image:height' content='960' />\n";
        echo "<meta property='og:type' content='article'>\n";
        echo "<meta property='og:url' content='" . get_permalink() . "'>\n";
    }
    ?>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> id="content">
    <header>

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid container-fluid-center">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" id="openButton" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation" onclick="toggleButtons()">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_menu_branco.svg" alt="">
                </button>
                <button class="button-close navbar-toggler" id="closeButton" style="display:none"
                    onclick="toggleButtons()">X</button>

                <div class="collapse navbar-collapse" id="navbarNav" style="font-size:14px">
                    <div class="barra-governo container ">
                        <div class=" d-flex  row">
                            <nav
                                class="nav nav-redes-sociais justify-content-md-start justify-content-center barra-governo-text col-md-6 col-12">
                                <a href="#site-conteudo" class="nav-link" target="_blank">ir para conteúdo</a>
                                <a href="#menu-do-site" class="nav-link">ir para navegação</a>
                                <a href="#buscarPortal" class="nav-link">ir para busca</a>
                                <a href="#site-mapa" class="nav-link" target="_blank"></i>mapa site</a>
                            </nav>



                            <nav class="nav nav-redes-sociais justify-content-md-end justify-content-center barra-governo-text barra-governo-text-3 col-md-6 col-12">
                                <a href="http://www.faleconosco.ms.gov.br/faq/#/home" class="nav-link"
                                    target="_blank">ouvidoria</a>
                                <a href="http://www.transparencia.ms.gov.br/" class="nav-link"
                                    target="_blank">transparência</a>

                                <a href="" style="color:#8e8e8d;text-transform:none">Siga @governoms</a>

                                <!-- instagran -->
                                <a href="https://www.instagram.com/governoms/" class="nav-link" target="_blank">
                                    <svg width="27" height="26" viewBox="0 0 27 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.7573 23.6392C13.0245 23.6392 11.509 23.6918 10.9743 23.632C10.3119 23.5573 9.5551 23.6277 8.83615 23.5889C8.6131 23.5769 8.62411 23.5434 8.38142 23.5363C7.29774 23.5047 6.13749 23.3965 5.19309 22.8187C2.9161 21.4258 2.85045 19.0694 2.85045 16.385C2.85045 14.2224 2.71171 8.04389 3.09895 6.18333C3.52352 4.14089 4.90637 2.9744 6.9962 2.57281C8.53749 2.27699 15.143 2.38419 16.2937 2.38419C19.8105 2.38419 23.0016 2.42346 23.8402 6.30253C24.1916 7.9295 23.958 9.76469 24.0624 10.6962L24.1073 14.9156C24.0997 15.1755 24.0538 15.2276 24.0533 15.5211C24.0528 15.961 24.0552 16.4018 24.0552 16.8417C24.0552 17.0523 24.0666 17.295 24.0552 17.5013C24.0427 17.7378 24.0011 17.8139 24.003 18.1087C24.0183 20.5078 23.0854 22.2668 21.1277 23.0964C19.7783 23.6679 17.824 23.5683 16.3425 23.5865L15.076 23.6392C14.6365 23.6392 14.1967 23.6392 13.7573 23.6392ZM0.466309 9.53684V16.4865C0.466309 19.9908 0.875557 22.04 2.66049 23.8297C4.4301 25.6036 6.62809 25.9726 10.1046 25.9726H16.7503C19.4462 25.9726 21.9189 25.8544 23.8915 24.1351C25.8348 22.4416 26.3886 20.1741 26.3886 17.6535V8.11665C26.3886 5.57161 25.6994 3.35062 23.868 1.81029C21.8595 0.12205 19.5424 0 16.8011 0H10.1046C7.25083 0 4.63066 0.168 2.66049 2.14344C0.87077 3.93746 0.466309 6.02442 0.466309 9.53684Z"
                                            fill="#004f9f" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.6041 17.2973C12.3395 17.2973 11.2505 16.8933 10.3946 16.0427C7.74236 13.4081 9.50956 8.67322 13.5026 8.67322C17.4496 8.67322 19.4452 13.8624 15.9816 16.4787C15.3938 16.9225 14.4202 17.2973 13.6041 17.2973ZM6.75586 12.9855C6.75586 18.8496 14.1186 22.2677 18.5625 17.2843C19.5467 16.1801 20.1478 14.4966 20.1478 12.9855C20.1478 7.8456 14.3608 4.33368 9.63643 7.49619C8.02143 8.57701 6.75586 10.6668 6.75586 12.9855Z"
                                            fill="#004f9f" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18.832 5.88408V6.13729C18.832 6.91273 19.5275 7.60869 20.303 7.60869C20.8606 7.60869 21.121 7.5455 21.5346 7.11518C22.904 5.69021 20.7951 3.5372 19.351 4.88081C19.1241 5.09238 18.832 5.47099 18.832 5.88408Z"
                                            fill="#004f9f" />
                                    </svg>
                                </a>
                                <!-- facedook -->
                                <a href="https://www.facebook.com/GovernoMS" class="nav-link" target="_blank">
                                    <svg width="14" height="26" viewBox="0 0 14 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.95662 6.79746V9.4861H0V14.153H3.95662V25.9726H8.77577V14.153H12.7324L13.3412 9.4861H8.77577V6.4423C8.77577 4.50085 9.89101 4.31176 11.5658 4.31176H13.4935V0.152199C13.012 0.152199 12.5716 0.0526303 12.1259 0.048801C11.3998 0.0425784 10.7521 0.00717992 10.1466 0H9.7546C8.36839 0.0186678 7.17178 0.263721 5.69607 1.48574C5.20257 1.89404 4.73442 2.73651 4.46445 3.34871C4.04371 4.30364 3.95662 5.60081 3.95662 6.79746Z"
                                            fill="#004f9f" />
                                    </svg>
                                </a>
                                <!-- twiter -->
                                <a href="https://twitter.com/GovernoMS" class="nav-link" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="27px"
                                        height="26px" version="1.1"
                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                        viewBox="0 0 30 30" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                                        <defs>
                                            <style type="text/css">
                                                <![CDATA[
                                                .fil0 {
                                                    fill: #004f9f
                                                }
                                                ]]>
                                            </style>
                                        </defs>
                                        <g id="Camada_x0020_1">
                                            <metadata id="CorelCorpID_0Corel-Layer" />
                                            <path class="fil0"
                                                d="M17.85 12.67l5.3 7.71c0.28,0.42 0.51,0.71 0.78,1.12 0.26,0.4 0.47,0.71 0.74,1.07l5.33 7.77 -8.97 0c-0.09,-0.36 -0.73,-1.16 -0.98,-1.51l-6.14 -8.95c-0.2,-0.3 -0.34,-0.47 -0.53,-0.76 -0.2,-0.3 -0.27,-0.58 -0.62,-0.67 -0.12,0.44 -1.16,1.4 -1.53,1.83 -0.14,0.18 -0.14,0.21 -0.3,0.39l-1.91 2.22c-0.14,0.18 -0.19,0.21 -0.33,0.37l-5.74 6.67c-0.21,0.22 -0.2,0.12 -0.28,0.41l-2.67 0 2.52 -2.91c0.17,-0.19 0.2,-0.27 0.39,-0.47 0.77,-0.81 1.42,-1.73 2.2,-2.54 0.18,-0.19 0.19,-0.24 0.35,-0.43l6.26 -7.27 -2.16 -3.17c-0.27,-0.36 -0.46,-0.7 -0.73,-1.08l-5.11 -7.4c-0.25,-0.38 -0.45,-0.71 -0.73,-1.08 -0.43,-0.58 -2.79,-3.89 -2.9,-4.33l8.88 0c0.11,0.41 4.23,6.21 4.77,7.03 0.79,1.19 2.3,3.13 2.9,4.26 0.29,-0.2 0.47,-0.49 0.71,-0.76l1.34 -1.58c0.13,-0.15 0.21,-0.21 0.34,-0.36l0.66 -0.8c0.86,-1.1 1.85,-2.14 2.75,-3.2l2.41 -2.76c0.15,-0.17 0.15,-0.22 0.3,-0.39 0.16,-0.18 0.22,-0.22 0.37,-0.41 0.13,-0.17 0.16,-0.2 0.32,-0.37 0.63,-0.68 0.42,-0.67 1.57,-0.66 0.52,0 1.04,0 1.56,0 -0.41,0.6 -0.95,1.07 -1.38,1.63 -0.87,1.13 -1.87,2.17 -2.79,3.25 -0.13,0.16 -0.21,0.21 -0.33,0.36l-0.7 0.85c-0.15,0.17 -0.22,0.22 -0.37,0.41l-5.55 6.51zm4.39 15.78l4.14 0c-0.08,-0.3 -0.94,-1.41 -1.14,-1.71l-4.69 -6.69c-0.42,-0.58 -0.75,-1.11 -1.17,-1.67l-11.71 -16.83 -4.05 0c0.03,0.37 1.36,2.16 1.66,2.56l2.95 4.22c2.72,3.75 5.47,7.95 8.2,11.71l5.24 7.51c0.19,0.29 0.49,0.59 0.57,0.9z" />
                                        </g>
                                    </svg>
                                </a>

                                <!-- tiktok -->
                                <a href="https://www.youtube.com/governomatogrossodosul" class="nav-link"
                                    target="_blank">
                                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.3602 18.0589C12.3602 20.9457 8.80524 22.9336 6.22094 20.9515C6.13526 20.8854 5.87728 20.6777 5.80931 20.6025C4.6969 19.3757 4.42168 17.9484 5.04729 16.3769C5.55898 15.0903 7.02562 14.1023 8.50468 14.1023C9.00488 14.1023 9.37489 14.2124 9.77314 14.3053V9.99348C9.31984 9.8877 8.8431 9.892 8.35295 9.892C5.9807 9.892 3.95541 11.0666 2.75972 12.2633C-2.34521 17.3749 1.34823 25.9726 8.55591 25.9726C13.0065 25.9726 16.672 22.3597 16.672 17.9072V11.0078C16.672 10.1184 16.6214 9.40904 16.6214 8.52256C17.8329 9.33341 17.952 9.48228 19.477 10.0801C20.4534 10.4631 21.8789 10.7546 23.2163 10.7546V6.49304C21.6329 6.49304 20.0542 5.92439 18.9418 4.93356L18.1563 4.14664C17.5398 3.45832 17.0191 2.36745 16.8037 1.44124L16.6214 0H12.3602V18.0589Z"
                                            fill="#004f9f" />
                                    </svg>
                                </a>
                                <!-- you tube -->
                                <a href="https://www.tiktok.com/@governodems" class="nav-link" target="_blank">
                                    <svg width="27" height="20" viewBox="0 0 27 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.7627 13.9305V6.03594C10.238 6.20586 15.5699 9.36598 16.5655 9.95042C15.5938 10.5306 10.1887 13.7017 9.7627 13.9305ZM0.311099 14.7806C0.455655 16.465 1.4154 17.6885 2.32821 18.2839C3.98151 19.3623 4.76467 19.2264 6.97992 19.2264C10.658 19.2264 14.3354 19.2264 18.0134 19.2264C19.6983 19.2264 21.7585 19.4298 23.205 18.8186C26.7065 17.339 26.144 13.7089 26.144 10.655C26.144 8.97779 26.2599 6.83722 26.1206 5.21504C25.9755 3.52249 25.0278 2.28226 24.1068 1.68059C22.455 0.601204 21.6666 0.740511 19.4528 0.740511C15.7748 0.740511 12.0966 0.740511 8.41908 0.740511C6.75143 0.740511 4.64248 0.557663 3.22804 1.14833C1.91555 1.69688 1.02241 2.72264 0.557629 4.04183C0.141193 5.22556 0.168458 13.1211 0.311099 14.7806Z"
                                            fill="#004f9f" />
                                    </svg>
                                </a>
                            </nav>

                        </div>
                    </div>
                    </ul>
                </div>
            </div>
        </nav>



        <Script>
            function toggleButtons() {
                var openButton = document.getElementById("openButton");
                var closeButton = document.getElementById("closeButton");
                var fechar = removeShowClassFromNavbar();
                if (openButton.style.display === "none") {
                    openButton.style.display = "inline-block";
                    closeButton.style.display = "none";
                } else {
                    openButton.style.display = "none";
                    closeButton.style.display = "inline-block";
                    fechar;
                }
            }


            function removeShowClassFromNavbar() {
                var navbarNav = document.getElementById("navbarNav");
                var buttonClose = document.getElementsByClassName("button-close")[0];
                if (navbarNav.classList.contains("show")) {
                    navbarNav.classList.remove("show");
                    buttonClose.style.display = "none";
                }

            }
        </Script>




        <!-- Img Banner -->
        <section class="banner banner-azul-topo" alt="banner principal">
            <!-- // Img Banner -->

            <div class="topo topo-home">

                <div class="container">
                    <div class="container">

                        <div class="logo-cabecario-home">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-topo">
                                <div>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_governo.svg"
                                        alt="Governo de MS" class="">
                                </div>
                            </a>
                        </div>
                        <div class="identificacao-do-site"> 
                            <?php
                            // Se for FrontPage or Home
                            if (is_home() || is_front_page()) {
                                echo '<p>' . get_bloginfo('name') . '</p>';
                                echo '<p>' . get_bloginfo('description') . '</p>';
                            } else {
                                echo '<p>' . get_bloginfo('name') . '</p>';
                                echo '<p>' . get_bloginfo('description') . '</p>';
                            }
                            ?>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </header>


    <div class="container" style="padding: 20px;">
        <div class=" container menu-inicial-direction">
            <div class="menu-principal-cards">

                <div class="menu-principal-div">
                    <nav class="menu-principal main-menu col">
                        <div class="container">
                            <div class="row">
                                <div class="col-4 d-md-none">
                                    <button id="menuBtnMenu" class="navbar-toggler" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                                        aria-controls="navbarTogglerDemo01" aria-expanded="true"
                                        aria-label="Toggle navigation" onclick="toggleButtonsMenu()">
                                        <i class="fa fa-bars"></i> MENU
                                    </button>
                                    <button class="navbar-toggler" id="closeButtonMenu" style="display:none"
                                        onclick="toggleButtonsMenu()">Fechar</button>

                                </div>
                                <div class="col-12" id="menu_topo1">
                                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'container' => null,
                                                'menu_class' => 'nav justify-content-between',
                                                'depth' => 4, // 1 = no dropdowns, 2 = with dropdowns. 
                                                'container' => 'li',
                                                'container_class' => 'collapse navbar-collapse',
                                                'container_id' => 'navbarTogglerDemo01',
                                                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                                'walker' => new Custom_Walker_Nav_Menu()
                                            )
                                        );
                                        ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="search-content">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <label>
                            <span class="screen-reader-text"><?php echo _x('Search for:', 'label'); ?></span>
                            <input type="search" class="search-field"
                                value="<?php echo get_search_query(); ?>" name="s" />
                        </label>
                        <button type="submit" class="search-submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>


            <script>
                function toggleButtonsMenu() {
                    var menuBtnMenu = document.getElementById("menuBtnMenu");
                    var closeButtonMenu = document.getElementById("closeButtonMenu");
                    var fechar = removeShowClassFromNavbarMenu();
                    if (menuBtnMenu.style.display === "none") {
                        menuBtnMenu.style.display = "inline-block";
                        closeButtonMenu.style.display = "none";
                    } else {
                        menuBtnMenu.style.display = "none";
                        closeButtonMenu.style.display = "inline-block";
                        fechar;
                    }
                }


                function removeShowClassFromNavbarMenu() {
                    var navbarNav = document.getElementById("navbarTogglerDemo01");
                    var buttonClose = document.getElementsByClassName("button-close")[0];
                    if (navbarNav.classList.contains("show")) {
                        navbarNav.classList.remove("show");
                        buttonClose.style.display = "none";
                    }

                }
            </script>

        </div>
    </div>







    <?php wp_body_open(); ?>