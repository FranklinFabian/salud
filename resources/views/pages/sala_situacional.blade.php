{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')


        <!--begin::Notice-->
        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
            <div class="alert-icon">
										<span class="svg-icon svg-icon-primary svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
													<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
            </div>
            <div class="alert-text"><h3>Reporte de Diciembre 2020 a Enero 2021</h3></div>
        </div>
        <!--end::Notice-->
        <!--begin::Row-->
        <div class="row">

            <div class="col-xl-12">
                <!--begin::Example-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">COVID 19</h3>
                        </div>
                        <div class="card-toolbar">
                            <ul class="nav nav-bold nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab1">Gráfico 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab2">Gráfico 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab3">Gráfico 3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab4">Gráfico 4</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab5">Gráfico 5</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab6">Gráfico 6</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab7">Gráfico 7</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                                <strong>Gráfico 1. Casos confirmados, entre el 1 de diciembre 2020, al 4 de febrero 2021, en la Seguridad Social de Corto Plazo</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g1.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>


                                La curva ilustra la tendencia ascendente desde la primera semana de diciembre, que se mantiene hasta aproximadamente el 21 de enero. Desde entonces, se observa una probable tendencia a la baja. Debido al lapso entre tomarse una prueba de PCR, y el tiempo de reporte del resultado, esta tendencia podría ilustrar mas que una baja en el número de confirmados, la saturación de la capacidad laboratorial, y, por ende, el retraso de este indicador. Por ello, en el gráfico dos analizamos la tendencia de los sospechosos, que probablemente reflejan mejor la verdadera demanda de servicios de salud.
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2">
                                <strong>Gráfico 2. Casos sospechosos, entre el 1 de diciembre 2020, al 4 de febrero 2021, en la Seguridad Social de Corto Plazo.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g2.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                En el caso de sospechosos, estos se mantuvieron relativamente constantes - alrededor de 400 casos - hasta aproximadamente el 21 de enero. Desde entonces, se observa una leve tendencia de ascenso, llegando a 903 el 4 de febrero. Probablemente el seguimiento de los sospechosos sea un indicador mas sensible para evaluar la verdadera necesidad de servicios de salud, debido a que la actual saturación para pruebas de laboratorio retrasa la verdadera situación de los confirmados.
                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3">
                                <strong>Gráfico 3. Tasa de positividad a COVID-19, en la Seguridad Social de Corto Plazo (entre el 1 de diciembre 2020, al 4 de febrero 2021)</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g3.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                Respecto a la tasa de positividad en el período, la curva de promedio de 7 días reporta en diciembre un inicio alrededor de 20%, para ir incrementándose hasta 60% alrededor de la tercera semana de enero, para paulatinamente disminuir nuevamente a alrededor de 10% para el 4 de febrero. Debido a que el eje troncal se encuentra más afectado por la epidemia actualmente, los análisis regionales ofrecerán mas información respecto a esta tendencia, que probablemente se encuentra enmascarada en esta ilustración nacional.
                            </div>
                            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4">
                                <strong>Gráfico 4. Tasa de positividad por COVID-19, por departamento, en los meses de diciembre, enero, y primera semana de febrero</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g4.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                En diciembre, la positividad de Pando, La Paz y Tarija superaba el 60%, Para Pando, la positividad ha disminuido en febrero a 6.4%; La Paz mantuvo una positividad de casi 80% también en enero, pero esta disminuye a menos de 10% en febrero. Tarija sostiene en febrero una positividad alta de 40%, y Santa Cruz que superó el 50% de positividad en enero, registra una disminución de casi 35% para febrero. En general, todos los departamentos han disminuido su porcentaje de positividad en el tiempo, lo que podría interpretarse como una disminución de la velocidad de transmisión viral comunitaria, o una saturación del sistema laboratorial instalado, y que ha incrementado el promedio de días que toma confirmar los resultados.
                            </div>
                            <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5">
                                <strong>Gráfico 5. Casos COVID-19 (confirmados y sospechosos) por ente gestor, en los meses de diciembre y enero </strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g5.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                La gráfica ilustra el porcentaje de incremento de casos confirmados y sospechosos entre los meses de diciembre y enero. Cabe resaltar que todos los Entes Gestores a excepción de la CSBP y CBES vieron un incremento de casos en enero, siendo el más significativo en COSSMIL, seguido por el SSU. La CNS fue el ente que vio el menor incremento de casos entre diciembre y enero.
                            </div>
                            <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab6">
                                <strong>Gráfico 6. Número de casos críticos/graves por ente gestor, en los meses de diciembre y enero.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g6.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                Respecto a la tendencia de casos graves/críticos entre los meses de diciembre y enero, se observa que estos pacientes incrementaron en enero en todos los entes gestores, siendo el incremento más significativo en COSSMIL, seguido por CSC. En febrero se confirmará si esta tendencia se mantiene.
                            </div>
                            <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="tab7">
                                <strong>Gráfico 7. Número de pacientes internados por ente gestor, en los meses de diciembre y enero.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g7.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                En general, el número de internaciones se ha incrementado de diciembre a enero significativamente en todos los Entes Gestores. El Ente Gestor que reporta el mayor incremento es COSSMIL, con 61.5%, seguido de CSC con el 33.3%. Se hará el seguimiento de esta tendencia en febrero
                            </div>

                        </div>
                    </div>
                </div>
                <!--end::Card-->
                <!--end::Example-->
            </div>

        </div>





        <br>







        <div class="row">

            <div class="col-xl-12">
                <!--begin::Example-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label"></h3>
                        </div>
                        <div class="card-toolbar">
                            <ul class="nav nav-bold nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab8">Gráfico 8</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab9">Gráfico 9</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab10">Gráfico 10</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab11">Gráfico 11</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab12">Tabla 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab13">Gráfico 12</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab14">Gráfico 13</a>
                                </li>

                            </ul>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab8" role="tabpanel" aria-labelledby="tab8">
                                <strong>Gráfico 8. Número de fallecidos por COVID-19, en los meses de diciembre, enero y febrero, en la SSCP.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g8.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>


                                El número de fallecimientos desde el 1 de diciembre ha ido en ascenso. En diciembre, se mantuvo por debajo de 5 al día, para llegar a casi 20 al día a finales de enero. En febrero se ha mantenido constante entre 18 a 20, lo cual sugiere que la transmisión viral se mantiene elevada en la comunidad.

                            </div>
                            <div class="tab-pane fade" id="tab9" role="tabpanel" aria-labelledby="tab9">
                                <strong>Gráfico 9. Número de casos confirmados y sospechosos, estratificados por grupo etáreo, en los meses de diciembre, enero y febrero, en la SSCP.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g9.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                Desde el mes de diciembre, se observa que el 79% de los casos confirmados y el 78% de los sospechosos se encuentran entre los rangos de edad 20 a 59 años. El rango de 20 a 39 años representa casi la mitad de los casos confirmados (46%) y sospechosos (44%), confirmando que la población económicamente activa es la directa afectada por el virus. La población más vulnerable (mayores a 60 años) representan el 15% del total de confirmados, y el 16% de casos sospechosos.
                            </div>
                            <div class="tab-pane fade" id="tab10" role="tabpanel" aria-labelledby="tab10">
                                <strong>Gráfico 10. Promedio de edad por Ente Gestor, estratificados en los meses de diciembre, enero y febrero, en la SSCP.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g10.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                            </div>
                            <div class="tab-pane fade" id="tab11" role="tabpanel" aria-labelledby="tab11">
                                <strong>Gráfico 11. Casos Confirmados, Estratificados por sexo, en los meses de diciembre, enero y febrero de la SSCP.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g11.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                En términos de diferencias de sexo, en los tres meses analizados el sexo femenino registra un mayor número de casos confirmados. La diferencia se hace un poco mayor en el mes de febrero.
                            </div>
                            <div class="tab-pane fade" id="tab12" role="tabpanel" aria-labelledby="tab12">
                                <strong>Tabla 1. Porcentaje de ocupación de camas hospitalarias y UTIS, al 3 de febrero de 2021, en la Seguridad Social de Corto Plazo, eje troncal.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/t1.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                            </div>
                            <div class="tab-pane fade" id="tab13" role="tabpanel" aria-labelledby="tab13">
                                <strong>Gráfico 12. Porcentaje de ocupación de camas hospitalarias (16 enero 2021 - 3 febrero 2021). CNS</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g12.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                A nivel nacional, la CNS ha mantenido una ocupación máxima de casi 80% al inicio del período, y en los primeros días de febrero fluctúa alrededor del 60%. El agregado a nivel nacional probablemente enmascara porcentajes de utilización más elevados en regionales específicas, por lo que se hará el análisis más detallado por departamento.
                            </div>
                            <div class="tab-pane fade" id="tab14" role="tabpanel" aria-labelledby="tab14">
                                <strong>Gráfico 13. Porcentaje de ocupación de camas UTI (16 enero 2021 - 3 febrero 2021).</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana1/g13.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                Respecto al uso de camas UTI, la utilización en las dos semanas de enero se mantuvo relativamente constante alrededor de 40%, pero a inicios de febrero, se reporta un incremento significativo de utilización, el cual se encuentra rondando el 80%. El dato recomienda activar de forma inmediata mecanismos de readecuación y/o compra de servicios de terapia intensiva. El análisis regional ofrecerá datos más granulares.
                            </div>

                        </div>
                    </div>
                </div>
                <!--end::Card-->
                <!--end::Example-->
            </div>





        </div>
        <!--end::Row-->


        <br>




        <div class="row">

            <div class="col-xl-12">
                <!--begin::Example-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label"></h3>
                        </div>
                        <div class="card-toolbar">
                            <ul class="nav nav-bold nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab15">Gráfico 14</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab16">Tabla 2</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab15" role="tabpanel" aria-labelledby="tab15">
                                <strong>Gráfico 14. Número de fallecidos por COVID-19, en los meses de diciembre, enero y febrero, en la SSCP.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana2/g14.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                El número de fallecimientos desde el 1 de diciembre ha ido en ascenso. En diciembre, se mantuvo por debajo de 5 al día, para llegar
                                a casi 20 al día a finales de enero. En febrero se ha mantenido constante entre 18 a 20, lo cual sugiere que la transmisión viral se
                                mantiene elevada en la comunidad. Desde el 1 de febrero, el número de personas fallecidas fluctúa entre las 14 a 20, y mantiene un
                                comportamiento en meseta

                            </div>
                            <div class="tab-pane fade" id="tab16" role="tabpanel" aria-labelledby="tab16">
                                <strong>Tabla 2. Porcentaje de ocupación de camas hospitalarias y UTIS, al 16 de febrero de 2021, en comparación al 3 de febrero, en
                                    la Seguridad Social de Corto Plazo, eje troncal.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana2/t2.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                            </div>

                        </div>
                    </div>
                </div>
                <!--end::Card-->
                <!--end::Example-->
            </div>





        </div>
        <!--end::Row-->




        <br>




        <div class="row">

            <div class="col-xl-12">
                <!--begin::Example-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label"></h3>
                        </div>
                        <div class="card-toolbar">
                            <ul class="nav nav-bold nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab17">Gráfico 15</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab18">Gráfico 16</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab19">Gráfico 17</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab20">Gráfico 18</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab21">Tabla 3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab22">Gráfico 19</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab23">Gráfico 20</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab24">Gráfico 21</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="tab-content">


                            <div class="tab-pane fade show active" id="tab17" role="tabpanel" aria-labelledby="tab17">
                                <strong>Gráfico 15. Curva de comportamiento de casos confirmados, en la Seguridad Social de Corto Plazo (actualizado al 17 de febrero, 2021).</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana3/g15.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                Desde el 21 de enero aproximadamente, el número de casos confirmados ha mantenido una tendencia a la baja, y actualmente reporta el valor más bajo
                                desde que se inició este seguimiento. Sin embargo, la cantidad de asegurados sospechosos ha incrementado de forma significativa, como se observa en el gráfico 15.

                            </div>

                            <div class="tab-pane fade" id="tab18" role="tabpanel" aria-labelledby="tab18">
                                <strong>Gráfico 16. Curva de comportamiento de casos sospechosos, en la Seguridad Social de Corto Plazo (actualizado al 17 de febrero, 2021).</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana3/g16.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                En el caso de sospechosos, estos se mantuvieron relativamente constantes - fluctuando alrededor de 400 casos - hasta aproximadamente el 21 de enero. Desde entonces,
                                se observa una significativa tendencia de ascenso, fluctuando entre 800 casos del 30 de enero al 13 de febrero, e iniciar una leve tendencia a la baja desde entonces.
                                Probablemente el seguimiento de los sospechosos sea un indicador más sensible para evaluar la verdadera necesidad de servicios de salud, debido a que la actual saturación
                                para pruebas de laboratorio probablemente enmascara la verdadera situación de los confirmados.

                            </div>


                            <div class="tab-pane fade" id="tab19" role="tabpanel" aria-labelledby="tab19">
                                <strong>Gráfico 17. Comparación de las curvas epidemiológicas de porcentaje de confirmados, sospechosos, y descartados por COVID-19, en la Seguridad Social de Corto Plazo
                                    (actualizado al 17 de febrero, 2021).</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana3/g17.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                El gráfico 3 ilustra los promedios de 7 días para sospechosos, confirmados, y descartados. Se observa que diciembre y prácticamente todo enero, un 30% de personas que se realizaban
                                la prueba salían positivas, pero desde inicios de febrero, este porcentaje ha disminuido significativamente, hasta encontrarse el 17 de febrero por debajo del 5%. Aunque se esperaría
                                que los descartados se incrementan, estos presentaron un importante pico de 80%, para disminuir de forma acelerada y encontrarse al 17 de febrero en aproximadamente 20%.
                                El grupo sospechosos es el que mas se ha incrementado en febrero, llegando a niveles de casi 80% en la tercera semana de febrero. Este incremento acelerado de sospechosos podría
                                explicarse por a) un retraso importante entre el día que se toma la muestra, y el día que el asegurado recoge su resultado; b) No se esta actualizando la información de la ficha,
                                para catalogar si el sospechoso fue confirmado o descartado. Se prepara un instructivo para que los Entes Gestores incrementen esfuerzos de llenado de la base de datos de forma integral.

                            </div>


                            <div class="tab-pane fade" id="tab20" role="tabpanel" aria-labelledby="tab20">
                                <strong>Gráfico 18. Comparación de las curvas epidemiológicas de porcentaje de confirmados, sospechosos, y descartados por COVID-19, en la Seguridad Social de Corto Plazo
                                    (actualizado al 17 de febrero, 2021).</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana3/g18.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                El número de fallecimientos desde el 1 de diciembre ha ido en ascenso. En diciembre, se mantuvo por debajo de 5 al día, para llegar a casi 20 al día a finales de enero.
                                En febrero se ha mantenido constante entre 18 a 20, lo cual sugiere que la transmisión viral se mantiene elevada en la comunidad. Desde el 1 de febrero, el número de personas
                                fallecidas fluctúa entre las 14 a 20, y mantiene un comportamiento en meseta actualmente.

                            </div>


                            <div class="tab-pane fade" id="tab21" role="tabpanel" aria-labelledby="tab21">
                                <strong>Tabla 3. Comparación del porcentaje de ocupación de camas hospitalarias y UTIS, entre el 16 de febrero y 3 de febrero de 2021, en la Seguridad Social de Corto Plazo, eje troncal.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana3/t3.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>


                                A nivel nacional, el porcentaje de ocupación de camas hospitalarias superó el 70% en la CBES, y un 50% pasaron de ocupación amarilla (ocupación moderada) a verde (ocupación baja). En el casos de UTIs,
                                se mantienen las mismas proporciones de ocupación alta, moderada y baja, pero si cambiaron los Entes Gestores. Por ejemplo, la CPS reportaba el 3 de enero un % de 100 de ocupación. Actualmente este ha disminuido
                                en 44 puntos porcentuales. Por otro lado, SSU reportaba una utilización moderada, la cual se ha incrementado en casi 20 puntos porcentuales, para ser ahora catalogada en alta.
                                <br>
                                A nivel de La Paz, la situación de saturación ha mejorado. Para camas hospitalarias, ningún Ente Gestor supera el 70% de ocupación (al 3 de febrero lo reportaba la CSC), y el 66% pasaron de ocupación moderada a baja.
                                Respecto a UTIs, un 16% pasó de ocupación alta a baja, y todos los demás mantienen un nivel de ocupación alto.
                                <br>
                                En Cochabamba, el 3 de enero solo la CPS reportaba niveles altos de ocupación en camas hospitalarias, y al 16 de febrero ninguno. Sin embargo, un 50% más de Entes Gestores reportan un incremento de ocupación baja a
                                moderada, lo cual amerita un monitoreo cercano de la situación. Respecto a UTIs, la CSBP es la única con ocupación alta, y un 50% de entes pasó de ocupación moderada a baja, en comparación al 3 de enero.
                                <br>
                                En Santa Cruz, ningún % de ocupación de camas hospitalarias es alto, y la proporción de utilización moderada y baja se mantiene estable (33.3% y 66.6% respectivamente). Respecto a UTIs, la proporción de utilización alta,
                                moderada y baja se mantiene constante, pero esta ha variado entre entes. Al 3 de febrero, la CNS reportaba un 88% de utilización, el cual ha disminuido en 38 puntos porcentuales al 16 de febrero. Por otro lado, COSSMIL se
                                encontraba con el 60% de sus camas ocupadas, y al 16 de febrero incrementó en 20 puntos porcentuales, colocándolo en un % de ocupación alto. También la CSC incremento 75 puntos porcentuales entre el 3 y 16 de enero.
                                La próxima semana se analizará nuevamente estos datos para detectar tendencias probablemente más estables.

                            </div>

                            <div class="tab-pane fade" id="tab22" role="tabpanel" aria-labelledby="tab22">
                                <strong>Gráfico 19. Relación mujeres/hombres en casos confirmados por COVID-19, en los meses de diciembre, enero y febrero 2021.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana3/g19.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                Actualizando los datos de febrero, se observa que la brecha de mujeres vs hombres se amplía aún más incluyendo la 3 semana de febrero. Debido a que las mujeres en promedio desarrollan casos menos severos que los hombres,
                                este indicador podría explicar al menos parcialmente la disminución en general de la utilización de camas hospitalarias.

                            </div>


                            <div class="tab-pane fade" id="tab23" role="tabpanel" aria-labelledby="tab23">
                                <strong>Gráfico 20. Relación entre sexo y severidad de la enfermedad por COVID-19, en los meses de diciembre, enero y febrero 2021, en la Seguridad Social de Corto Plazo.</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana3/g20.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                En los tres meses de análisis, se observa una tendencia constante de una mayor proporción de casos graves y fallecidos entre hombres, en comparación a mujeres. Por ejemplo, en diciembre, los hombres graves/críticos representaron
                                el 43% de los casos, en comparación a las mujeres, que reportan un 32%, casi un 11% de diferencia. Por otro lado, esta tendencia se revierte en pacientes estables/leves en diciembre, siendo la proporción mayor de mujeres (54%),
                                en comparación a los hombres que llegan solamente al 46%. Esta tendencia se repite prácticamente constante en enero y la primera semana de febrero. Respecto a fallecidos, la proporción de hombres en los tres meses es constante
                                (superior a la proporción de fallecimientos en mujeres), y en enero, llegó a reportar un 80% de los fallecimientos en hombres.

                            </div>


                            <div class="tab-pane fade" id="tab24" role="tabpanel" aria-labelledby="tab24">
                                <strong>Gráfico 21. Proporción de diagnósticos clínicos en los meses de diciembre, enero y febrero, en la Seguridad Social de Corto Plazo</strong>

                                <br><br>
                                <div align="center">
                                    <img src="{{ asset('media/semana3/g21.jpg') }}" class="img-fluid" alt="Responsive image">
                                </div>
                                <br><br>

                                La gráfica 13 reporta la variación de los diagnósticos clínicos relacionados con COVID-19. Se observa que los diagnósticos de neumonía se mantuvieron constantes en diciembre y enero, pero han disminuido significativamente en febrero.
                                Este dato podría ayudarnos a confirmar que el número de casos severos se encuentra disminuyendo. Si enlazamos la caída de proporción de neumonías, y el incremento de cuadros clínicos relativamente menos severos como síndrome gripal,
                                infección respiratoria aguda, o bronquitis en febrero, en comparación a los otros meses, resulta una buena noticia para la capacidad de respuesta de los establecimientos de salud. La proporción de datos perdidos fue en promedio en
                                este período de 13%, lo cual necesitamos ir disminuyendo para contar con el denominador real de la epidemia del COVID-19 en la SSCP.

                            </div>

                        </div>
                    </div>
                </div>
                <!--end::Card-->
                <!--end::Example-->
            </div>





        </div>
        <!--end::Row-->

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
