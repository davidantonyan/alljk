<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, max-age=4800,   must-revalidate"/>
		<meta http-equiv="Pragma" content="no-cache"/>
		<meta http-equiv="Expires" content="Fri, 01 Jan 1990 00:00:00 GMT"/>
        <link rel='stylesheet' href="font-awesome/css/font-awesome.min.css">
        <link rel='stylesheet' href="css/style.css">
    </head>
    <body>
        <div class="main_header">
            <img src="images/main_fon.jpg" class="main_wall_image" alt="" />
            <div class="content_in_header">
                <div class="logo_row">
                    <a href="{{ urlFor('index') }}">
                        <div class="logo_direction">
                            <p class="logo">ALLJK</p>
                        </div>  
                    </a>

                    <div class="menu_direction">
                        <div class="menu">
                            <div class="first_menu_item">
                                <a href="">Новостройки Москвы</a>
                            </div>
                            <div class="second_menu_item">
                                <a href="">Новостройки Подмосковья</a>
                            </div>
                            <div class="third_menu_item">
                                <a href="">Загородная недвижимость</a>
                            </div>
							<div class="fourth_menu_item">
                                <a href="">Контакты</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text_in_header_place">
                    <p class="text_in_header">надежная недвижимость<br><span class="bold_text_in_header">из надежных рук!</span></p>
                </div>
                <!-- SEARCH BLOCK -->
                <form action="">
                    <div class="search_row">
                            <input type="text" class="first_select_in_search_row" name="jk" placeholder="Название ЖК">
                            <select class="second_select_in_search_row" name="stages_construction">
                                <option class="choise_of_second_select_in_search_row" value="">Этапы строительства</option>
                                <option value="Строительство">Строится</option>
                                <option value="Построен">Построен</option>
                            </select>
                            <select class="third_select_in_search_row">
                                <option class="choise_of_third_select_in_search_row" value="" name="metro">Метро</option>
                                {% for metro in metros  %}
                                    <option value="{{ metro.id }}">{{ metro.title }}</option>
                                {%  endfor %}
                            </select>
                            <select class="fourth_select_in_search_row" name="city">
                                <option class="choise_of_fourth_select_in_search_row">Город</option>
                                <optgroup label="Москва">
                                    <option value="79">Москва</option>
                                </optgroup>
                                <optgroup label="Московская область">
                                    {% for city in cities %}
                                        <option value="{{ city.id }}">{{ city.title }}</option>
                                    {% endfor %}
                                </optgroup>
                            </select>
                            <select class="sixth_select_in_search_row" name="directions">
                                <option class="choise_of_sixth_select_in_search_row" value="">Направления</option>
                                {% for direction in directions %}
                                    <option value="{{ direction }}">{{ direction }}</option>  
                                {% endfor %}
                            </select>
                            <a href="javascript:0;" onclick="event.preventDefault();this.closest('form').submit();">
                                <div class="main_search_icnon"><img src="images/lupa.png" class="lupa_general"></div>
                            </a> 
                    </div>
                </form>
                <!-- / SEARCH BLOCK -->
                <div class="button_search_for_min_only">
                    <a href="search_page.html">Поиск</a>
                </div>
            </div>
        </div>
        <a href="map.html"><div class="map_width_icon_and_text">
            <img src="images/map_dark.png" class="map_dark">
            <div class="icon_and_text_direction">
                <img src="images/direction_icon.png" class="direction_icon" alt="" />
                <p class="direction_text">новостройки на карте</p>
            </div>
			</div>
        </a>
        <div class="home_page_content">

            <div class="top_buttons">
                <div class="left_top_button active_top_button top_btn" data-target="#target-1">Сданные ЖК</div>
                <div class="right_top_button top_btn" data-target="#target-2">Строящиеся ЖК</div>
            </div>

            <div id="target-1" class="target active">
                {% for target_1 in targets_1 %}
                    <div class="row_done" id="jk-{{target_1.id}}">
                        <img src="images/exemple_image.png" class="done_image" alt="" />
                        <div class="about_done">
                            <p class="title_ablout_done">{{ target_1.title }}</p>
                            <p class="text_in_about_done"> 
                                {% autoescape false %}   
                                    {{ (target_1.description|striptags)|slice(0, 255) }} ...
                                {% endautoescape %}
                            </p>
                            <div class="star_rate">
                                <div class="rate_star full_star"></div>
                                <div class="rate_star full_star"></div>
                                <div class="rate_star full_star"></div>
                                <div class="rate_star"></div>
                                <div class="rate_star"></div>
                            </div>
                            <p class="price_text_in_done">
                                Цена (м<sup>2</sup>)
                            </p>
                            <p class="price_in_done">
                                {% if target_1.price %}
                                    {{ target_1.price|number_format }} руб
                                {% else %}
                                    цена не указана
                                {% endif %}
                            </p>
                            <p class="price_like_this"><b>Срок сдачи:</b> {{ target_1.time_to_ready ? target_1.time_to_ready : 'не указан' }}</p>
                                <p class="price_like_this"><b>Направление:</b> {{ target_1.getDirection() }}</p>
                                <p class="price_like_this"><b>Адрес:</b> {{ target_1.getAdress() }}</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">{{ target_1.getMetro().title }}</a></p>
                            <a href="kartochka.html"><div class="some_more">Подробнее</div></a>
                        </div>
                        <div class="uncerline_under_done"></div>
                    </div>
                {% endfor %}
                <a href="search_page.html">
                    <div class="see_some_more">
                        <div class="see_some_more_button">Посмотреть еще</div>
                    </div>
                </a>
            </div>

            <div id="target-2" class="target">
                <div class="row_done">
                    <img src="images/exemple_image.png" class="done_image" alt="" />
                    <div class="about_done">
                        <p class="title_ablout_done">lorem ipsum</p>
                        <p class="text_in_about_done">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <div class="star_rate">
                            <div class="rate_star full_star"></div>
                            <div class="rate_star full_star"></div>
                            <div class="rate_star full_star"></div>
                            <div class="rate_star"></div>
                            <div class="rate_star"></div>
                        </div>
                        <p class="price_text_in_done">
                            Цена (м<sup>2</sup>)
                        </p>
                        <p class="price_in_done">
                            10.000.000 руб
                        </p>
                        <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                            <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                            <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                            <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                        <a href="kartochka.html"><div class="some_more">Подробнее</div></a>
                    </div>
                    <div class="uncerline_under_done"></div>
                </div>
                <div class="row_done">
                    <img src="images/exemple_image.png" class="done_image" alt="" />
                    <div class="about_done">
                        <p class="title_ablout_done">lorem ipsum</p>
                        <p class="text_in_about_done">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <div class="star_rate">
                            <div class="rate_star full_star"></div>
                            <div class="rate_star full_star"></div>
                            <div class="rate_star full_star"></div>
                            <div class="rate_star"></div>
                            <div class="rate_star"></div>
                        </div>
                        <p class="price_text_in_done">
                            Цена (м<sup>2</sup>)
                        </p>
                        <p class="price_in_done">
                            10.000.000 руб
                        </p>
                        <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                            <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                            <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                            <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                        <a href="kartochka.html"><div class="some_more">Подробнее</div></a>
                    </div>
                    <div class="uncerline_under_done"></div>
                </div>
                <a href="search_page.html">
                    <div class="see_some_more">
                        <div class="see_some_more_button">Посмотреть еще</div>
                    </div>
                </a>
            </div>

        </div>
        <div class="home_page_content distanse">
            <div class="tabulation">
                <div class="tabs">
                    <a href="#t-1" class="href_tabulation"><div class="tab active_tab">СЗАО</div></a>
                    <a href="#t-2" class="href_tabulation"><div class="tab">САО</div></a>
                    <a href="#t-3" class="href_tabulation"><div class="tab">СВАО</div></a>
                    <a href="#t-4" class="href_tabulation"><div class="tab">ЗАО</div></a>
                    <a href="#t-5" class="href_tabulation"><div class="tab">ЦАО</div></a>
                    <a href="#t-6" class="href_tabulation"><div class="tab">ВАО</div></a>
                    <a href="#t-7" class="href_tabulation"><div class="tab">ЮЗАО</div></a>
                    <a href="#t-8" class="href_tabulation"><div class="tab">ЮАО</div></a>
                    <a href="#t-9" class="href_tabulation"><div class="tab">ЮВАО</div></a>
                    <a href="#t-10" class="href_tabulation"><div class="tab">ЗелАО</div></a>
                    <a href="#t-11" class="href_tabulation"><div class="tab">НЕАО</div></a>
                    <a href="#t-12" class="href_tabulation"><div class="tab">АО</div></a>
                </div>
                <div class="tabulatuin_page_content tab_active" id="t-1">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html">
                                    <div class="see_more_in_tab">
                                        Подробнее
									</div>
                                </a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
                
                <div class="tabulatuin_page_content" id="t-2">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
                
                <div class="tabulatuin_page_content" id="t-3">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
                
                <div class="tabulatuin_page_content" id="t-4">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
                
                <div class="tabulatuin_page_content" id="t-5">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
                
                <div class="tabulatuin_page_content" id="t-6">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
                
                <div class="tabulatuin_page_content" id="t-7">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
                
                <div class="tabulatuin_page_content" id="t-8">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
                
                <div class="tabulatuin_page_content" id="t-9">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
                
                <div class="tabulatuin_page_content" id="t-10">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
                
                <div class="tabulatuin_page_content" id="t-11">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
                
                <div class="tabulatuin_page_content" id="t-12">
                    <div class="line">
                        <div class="top_part_of_content_tab">
                            <div class="first_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                            <div class="second_part_tab">
                                <img src="images/exemple_image.png" class="image_exemple_in_tab" alt="" />
                                <p class="title_ablout_done">lorem ipsum</p>
                                <div class="star_rate">
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star full_star"></div>
                                    <div class="rate_star"></div>
                                    <div class="rate_star"></div>
                                </div>
                                <p class="price_text_in_done2">
                                    Цена (м<sup>2</sup>)
                                </p>
                                <p class="price_in_done2">
                                    10.000.000 руб
                                </p>
                                <p class="price_like_this"><b>Срок сдачи:</b> 12.12.12</p>
                                <p class="price_like_this"><b>Направление:</b> ЗАО</p>
                                <p class="price_like_this"><b>Адрес:</b> г. Балашиха, ул. д. 32А,32Б,32В,32,32Д</p>
                                <p class="price_like_this"><b>Метро:</b> <a href="map.html">Арбатская</a></p>
                                <a href="kartochka.html"><div class="see_more_in_tab">
                                    Подробнее
									</div></a>
                            </div>
                        </div>
                        <a href="search_page.html"><div class="button_to_see_more_in_tabulation_block">Посмотреть все</div></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="home_page_content distanse">
            <div class="first_part_in_news">
                <div class="part_with_left_floating">
                    <p class="title_news">
                        новости
                    </p>
                    <div class="first_part_in_first_part_in_news">
                        <img src="images/exemple_image_2.png" class="image_exemple_in_news" alt="" />
						<a href="news_page.html"><p class="titile_news">lorem ipsum dolor sit amet</p></a>
                        <p class="news_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        </p>
                    </div>
                    <div class="second_part_in_first_part_in_news">
                        <img src="images/exemple_image_4.png" class="image_exemple_in_news" alt="" />
						<a href="news_page.html"><p class="titile_news">lorem ipsum dolor sit amet</p></a>
                        <p class="news_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        </p>
                    </div>
                    <a href="news_page.html"><div class="button_in_news_accept">
                        Лента новостей
						</div></a>
                </div>
            </div>
            <div class="second_part_in_news">
                <div class="part_with_right_floating">
                    <div class="part_with_left_floating">
                    <p class="title_news">
                        новое в ALLJK
                    </p>
                    <div class="first_part_in_first_part_in_news">
                        <img src="images/exemple_image_3.png" class="image_exemple_in_news" alt="" />
						<a href="news_page.html"><p class="titile_news">lorem ipsum dolor sit amet</p></a>
                        <p class="news_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        </p>
                    </div>
                    <div class="second_part_in_first_part_in_news">
                        <img src="images/exemple_image_4.png" class="image_exemple_in_news" alt="" />
						<a href="news_page.html"><p class="titile_news">lorem ipsum dolor sit amet</p></a>
                        <p class="news_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        </p>
                    </div>
                    <a href="news_page.html"><div class="button_in_news_accept">
                        Лента новостей
						</div></a>
                    </div>
                </div>
        </div>
        </div>
        <div class="home_page_content distanse">
            <img src="images/act.png" class="act" alt="" />
            <p class="acts_hot">Самые горячие<br><span class="act_hot_bold">акции!</span></p>
            <a href="search_page.html"><div class="know_more_act">узнать больше</div></a>
            <a href="search_page.html"><p class="text_in_act_for_min">
                Самые горячие акции!
				</p></a>
        </div>
        <div class="home_page_content distanse">
            <div class="metro_tittle_part">
                <div class="metro_image_direction">
                    <img src="images/metro.jpg" class="metro_image" alt="" />
                    <p class="metro_titile">metro станции</p>
                </div>
            </div>
            <div class="metro_list_part">
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="block_under_list">
                    <img src="images/arrow_down.png" class="arrow_under_list" alt="" />
                    <div class="underline_under_lins"></div>
                    <p class="textr_under_underline">
                        Еще станции
                    </p>
                </div>
            </div>
        </div>
        <div class="home_page_content distanse">
            <div class="metro_tittle_part">
                <div class="metro_image_direction">
                    <img src="images/worker.jpg" class="metro_image" alt="" />
                    <p class="metro_titile">застройщики</p>
                </div>
            </div>
            <div class="metro_list_part">
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="metro_list_row">
                    <ul>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                        <a href="search_page.html"><li>Москва</li></a>
                    </ul>
                </div>
                <div class="block_under_list">
                    <img src="images/arrow_down.png" class="arrow_under_list" alt="" />
                    <div class="underline_under_lins"></div>
                    <p class="textr_under_underline">
                        Еще застройщики
                    </p>
                </div>
            </div>
        </div>
        <div class="home_page_content distanse">
            <div class="first_part_about_us">
                <img src="images/about_us.png" class="about_us_image" alt="" />
            </div>
            <div class="second_part_about_us">
                <p class="title_about_us">О нас</p>
                <p class="text_about_us">
                     AllJK – это онлайн каталог недвижимости, где размещены все жилые комплексы Московского региона. Основное направление компании – новостройки всех сегментов жилой недвижимости. Мы связующее звено тех, кто хочет приобрести недвижимость, с теми, кто ее продает. Наша компания работает только с надежными и проверенными временем, застройщиками и риэлторами Москвы!
                </p>
            </div>
        </div>
        <div class="footer">
            <div class="footer_content_block">
                <div class="first_footer_colomn">
                    <p class="footer_collomn_title">компания</p>
                    <div class="underline1_in_footer"></div>
                    <div class="underline2_in_footer"></div>
                    <a href="search_page.html"><p class="company">
                        Новостройки Москвы
						</p></a>
                    <a href="search_page.html"><p class="company">
                        Новостройки Подмосковья
						</p></a>
                    <a href="search_page.html"><p class="company">
                        Загородная недвижимость
						</p></a>
                </div>
                <div class="second_footer_colomn">
					<a name="kont"><p class="footer_collomn_title">контакты</p></a>
                    <div class="underline1_in_footer"></div>
                    <div class="underline2_in_footer"></div>
                    <p class="contacts">
                        Адрес<br>Москва, Россия<br><span class="bold_footer">8:00 - 17:00</span> 
                    </p>
                    <p class="contacts_tel">
                        Тел: <span class="bold_footer">33333333</span><br>Факс: <span class="bold_footer">333333333</span>
                    </p>
                    <p class="contacts_tel">Mail: <span class="footer_italic">info@.com</span></p>
                </div>
                <div class="third_footer_colomn">
                    <p class="footer_collomn_title">подписывайтесь!</p>
                    <div class="underline1_in_footer"></div>
                    <div class="underline2_in_footer"></div>
                    <div class="social_sites_block">
                        <div class="social_site_block">
                            <img src="images/twitter.png" class="social_site" alt="" />
                        </div>
                        <div class="social_site_block">
                            <img src="images/facebook.png" class="social_site" alt="" />
                        </div>
                        <div class="social_site_block">
                            <img src="images/in.png" class="social_site" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/sly.js"></script>
    <script type="text/javascript" src="javascript/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="javascript/javaWheel.js"></script>
    <script type="text/javascript" src="javascript/jquery.cycle2.js"></script>
    <script type="text/javascript" src="owl/owl.carousel.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
    <script type="text/javascript" src="javascript/app.js"></script>
</html>