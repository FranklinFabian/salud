<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header justify-content-left">
        <h3 class="card-title">Generación de Oxígeno y Uso</h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <!-- <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span> -->
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form action="{{ route('bancooxigeno.generacionoxigeno.store') }}" method="post" id="form_bancooxigeno_generacionoxigeno">
        @if ( $data['tipo'] == 'update' )
            <input type="hidden" class="form-control" id="id_item" name="item[id_item]" value="{{ $data['pid'] }}">
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $data['item']['id'] }}">
        @endif
            <input type="hidden" class="form-control" id="type" name="type" value="{{ $data['tipo'] }}">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>¿Su Establecimiento de Salud Cuenta con Generador de Oxigeno Medicinal?</label>
                            <div class="kt-radio-inline">
                                <label class="kt-radio kt-radio--brand">
                                    <input type="radio" name="item[generador_oxigeno]" @if ($data['tipo'] == 'update') @if($data['item']['generador_oxigeno'] == 'Si') checked="checked" @endif @endif value="Si"> Si
                                    <span></span>
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="kt-radio">
                                    <input type="radio" name="item[generador_oxigeno]" @if ($data['tipo'] == 'update') @if($data['item']['generador_oxigeno'] == 'No' || $data['item']['generador_oxigeno'] == "") checked="checked" @endif @endif value="No"> No
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tienegeneradoroxigeno" @if($data['item']['generador_oxigeno'] == 'No' || $data['item']['generador_oxigeno'] == "") style="display: none;" @endif>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingrese la Capacidad de Producción (m3/h).</label>
                                <input type="text" class="form-control numero_entero" placeholder="Ingrese un número" name="item[generador_capacidad_produccion]" id="generador_capacidad_produccion" @if ( $data['tipo'] == 'update') value="{{ $data['item']['generador_capacidad_produccion'] }}" @endif/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingrese el Consumo Promedio del Día Anterior (m3/día).</label>
                                <input type="text" class="form-control numero_entero" placeholder="Ingrese un número" name="item[generador_consumo_promedio]" id="generador_consumo_promedio" @if ( $data['tipo'] == 'update') value="{{ $data['item']['generador_consumo_promedio'] }}" @endif/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingresa el Número de Cilindros Recargados el Día Anterior (Si tiene recargas).</label>
                                <input type="text" class="form-control numero_entero" placeholder="Ingrese un número" name="item[generador_cilindros_recargados]" id="generador_cilindros_recargados" @if ( $data['tipo'] == 'update') value="{{ $data['item']['generador_cilindros_recargados'] }}" @endif/>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>¿Su Establecimiento Cuenta con Contrato Vigente para la Provisión de Oxigeno?</label>
                            <div class="kt-radio-inline">
                                <label class="kt-radio kt-radio--brand">
                                    <input type="radio" name="item[contrato_vigente]" @if ($data['tipo'] == 'update') @if($data['item']['contrato_vigente'] == 'Si') checked="checked" @endif @endif value="Si"> Si
                                    <span></span>
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="kt-radio">
                                    <input type="radio" name="item[contrato_vigente]" @if ($data['tipo'] == 'update') @if($data['item']['contrato_vigente'] == 'No' || $data['item']['contrato_vigente'] == "") checked="checked" @endif @endif value="No"> No
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tienecontratovigente" @if($data['item']['contrato_vigente'] == 'No' || $data['item']['contrato_vigente'] == "") style="display: none;" @endif>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Nombre de la Empresa.</label>
                                <input type="text" class="form-control " placeholder="Ingrese un nombre" name="item[empresa_contrato]" id="empresa_contrato" @if ( $data['tipo'] == 'update') value="{{ $data['item']['empresa_contrato'] }}" @endif/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingresa la Fecha Final del Contrato (Vigencia)</label>
                                <input type="date" class="form-control" name="item[fecha_final_contrato]" id="fecha_final_contrato" @if ( $data['tipo'] == 'update') value="{{ $data['item']['fecha_final_contrato'] }}" @endif/>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>¿Su Establecimiento Cuenta con Tanque Criogénico?</label>
                            <div class="kt-radio-inline">
                                <label class="kt-radio kt-radio--brand">
                                    <input type="radio" name="item[tanque_criogenico]" @if ($data['tipo'] == 'update') @if($data['item']['tanque_criogenico'] == 'Si') checked="checked" @endif @endif value="Si"> Si
                                    <span></span>
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="kt-radio">
                                    <input type="radio" name="item[tanque_criogenico]" @if ($data['tipo'] == 'update') @if($data['item']['tanque_criogenico'] == 'No' || $data['item']['tanque_criogenico'] == "") checked="checked" @endif @endif value="No"> No
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tienetanquecriogenico" @if($data['item']['tanque_criogenico'] == 'No' || $data['item']['tanque_criogenico'] == "") style="display: none;" @endif>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ingrese la Capacidad del Tanque (m3).</label>
                                <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[tanque_criogenico_capacidad]" id="tanque_criogenico_capacidad" @if ( $data['tipo'] == 'update') value="{{ $data['item']['tanque_criogenico_capacidad'] }}" @endif/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingrese el Consumo Promedio del Día Anterior (m3/día).</label>
                                <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[tanque_criogenico_consumo]" id="tanque_criogenico_consumo" @if ( $data['tipo'] == 'update') value="{{ $data['item']['tanque_criogenico_consumo'] }}" @endif/>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>¿Su Establecimiento de Salud Cuenta con tubos de oxígeno de 6m3?</label>
                            <div class="kt-radio-inline">
                                <label class="kt-radio kt-radio--brand">
                                    <input type="radio" name="item[tubos_6]" @if ($data['tipo'] == 'update') @if($data['item']['tubos_6'] == 'Si') checked="checked" @endif @endif value="Si"> Si
                                    <span></span>
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="kt-radio">
                                    <input type="radio" name="item[tubos_6]" @if ($data['tipo'] == 'update') @if($data['item']['tubos_6'] == 'No' || $data['item']['tubos_6'] == "") checked="checked" @endif @endif value="No"> No
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tienetubo6" @if($data['item']['tubos_6'] == 'No' || $data['item']['tubos_6'] == "") style="display: none;" @endif>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingrese el Número de Tubos de Oxigeno Medicinal Llenos (Disponibles).</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[tubos_llenos_6]" id="tubos_llenos_6" @if ( $data['tipo'] == 'update') value="{{ $data['item']['tubos_llenos_6'] }}" @endif/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ingrese el Número de Tubos de Oxigeno Medicinal Vacíos.</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[tubos_vacios_6]" id="tubos_vacios_6" @if ( $data['tipo'] == 'update') value="{{ $data['item']['tubos_vacios_6'] }}" @endif/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ingrese el Consumo de Tubos de Oxigeno Medicinal del Día Anterior.</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[tubos_consumo_oxigeno_6]" id="tubos_consumo_oxigeno_6" @if ( $data['tipo'] == 'update') value="{{ $data['item']['tubos_consumo_oxigeno_6'] }}" @endif/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>¿Su Establecimiento de Salud Cuenta con tubos de oxígeno de 8m3?</label>
                            <div class="kt-radio-inline">
                                <label class="kt-radio kt-radio--brand">
                                    <input type="radio" name="item[tubos_8]" @if ($data['tipo'] == 'update') @if($data['item']['tubos_8'] == 'Si') checked="checked" @endif @endif value="Si"> Si
                                    <span></span>
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="kt-radio">
                                    <input type="radio" name="item[tubos_8]" @if ($data['tipo'] == 'update') @if($data['item']['tubos_8'] == 'No' || $data['item']['tubos_8'] == "") checked="checked" @endif @endif value="No"> No
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tienetubo8" @if($data['item']['tubos_8'] == 'No' || $data['item']['tubos_8'] == "") style="display: none;" @endif>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingrese el Número de Tubos de Oxigeno Medicinal Llenos (Disponibles).</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[tubos_llenos_8]" id="tubos_llenos_8" @if ( $data['tipo'] == 'update') value="{{ $data['item']['tubos_llenos_8'] }}" @endif/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ingrese el Número de Tubos de Oxigeno Medicinal Vacíos.</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[tubos_vacios_8]" id="tubos_vacios_8" @if ( $data['tipo'] == 'update') value="{{ $data['item']['tubos_vacios_8'] }}" @endif/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ingrese el Consumo de Tubos de Oxigeno Medicinal del Día Anterior.</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[tubos_consumo_oxigeno_8]" id="tubos_consumo_oxigeno_8" @if ( $data['tipo'] == 'update') value="{{ $data['item']['tubos_consumo_oxigeno_8'] }}" @endif/>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Ingrese el Número de Camas Habilitadas en Internación.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un número" name="item[camas_habilitadas_internacion]" id="camas_habilitadas_internacion" @if ( $data['tipo'] == 'update') value="{{ $data['item']['camas_habilitadas_internacion'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Ingrese el Número de Camas Ocupadas en Internación.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un número" name="item[camas_ocupadas_internacion]" id="camas_ocupadas_internacion" @if ( $data['tipo'] == 'update') value="{{ $data['item']['camas_ocupadas_internacion'] }}" @endif/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Ingrese el Número de Camas Habilitadas en Terapia Intermedia.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un número" name="item[camas_habilitadas_terapia_intermedia]" id="camas_habilitadas_terapia_intermedia" @if ( $data['tipo'] == 'update') value="{{ $data['item']['camas_habilitadas_terapia_intermedia'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Ingrese el Número de Camas Ocupadas en Terapia Intermedia.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un número" name="item[camas_ocupadas_terapia_intermedia]" id="camas_ocupadas_terapia_intermedia" @if ( $data['tipo'] == 'update') value="{{ $data['item']['camas_ocupadas_terapia_intermedia'] }}" @endif/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Ingrese el Número de Camas Habilitadas en Terapia Intensiva.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un número" name="item[camas_habilitadas_terapia_intensiva]" id="camas_habilitadas_terapia_intensiva" @if ( $data['tipo'] == 'update') value="{{ $data['item']['camas_habilitadas_terapia_intensiva'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Ingrese el Número de Camas Ocupadas en Terapia Intensiva.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un número" name="item[camas_ocupadas_terapia_intensiva]" id="camas_ocupadas_terapia_intensiva" @if ( $data['tipo'] == 'update') value="{{ $data['item']['camas_ocupadas_terapia_intensiva'] }}" @endif/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Ingrese el Número de Camas Habilitadas en Emergencias.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un número" name="item[camas_habilitadas_emergencias]" id="camas_habilitadas_emergencias" @if ( $data['tipo'] == 'update') value="{{ $data['item']['camas_habilitadas_emergencias'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Ingrese el Número de Camas Ocupadas en Emergencias.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un número" name="item[camas_ocupadas_emergencias]" id="camas_ocupadas_emergencias" @if ( $data['tipo'] == 'update') value="{{ $data['item']['camas_ocupadas_emergencias'] }}" @endif/>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>¿Cuantos Pacientes COVID-19 Refirio a Otro Centro Médico el Día Anterior?</label>
                            <input type="text" class="form-control" placeholder="Ingrese un número" name="item[pacientes_covid_referidos]" id="pacientes_covid_referidos" @if ( $data['tipo'] == 'update') value="{{ $data['item']['pacientes_covid_referidos'] }}" @endif/>
                        </div>
                    </div>
                </div>


                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>¿Su Establecimiento Compra Servicios?</label>
                            <div class="kt-radio-inline">
                                <label class="kt-radio kt-radio--brand">
                                    <input type="radio" name="item[compra_servicios]" @if ($data['tipo'] == 'update') @if($data['item']['compra_servicios'] == 'Si') checked="checked" @endif @endif value="Si"> Si
                                    <span></span>
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="kt-radio">
                                    <input type="radio" name="item[compra_servicios]" @if ($data['tipo'] == 'update') @if($data['item']['compra_servicios'] == 'No' || $data['item']['compra_servicios'] == "") checked="checked" @endif @endif value="No"> No
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="compraservicios" @if($data['item']['compra_servicios'] == 'No' || $data['item']['compra_servicios'] == "") style="display: none;" @endif>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingrese el Número de Camas Habilitadas en Internación.</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[compra_camas_habilitadas_internacion]" id="compra_camas_habilitadas_internacion" @if ( $data['tipo'] == 'update') value="{{ $data['item']['compra_camas_habilitadas_internacion'] }}" @endif/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingrese el Número de Camas Ocupadas en Internación.</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[compra_camas_ocupadas_internacion]" id="compra_camas_ocupadas_internacion" @if ( $data['tipo'] == 'update') value="{{ $data['item']['compra_camas_ocupadas_internacion'] }}" @endif/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingrese el Número de Camas Habilitadas en Terapia Intermedia.</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[compra_camas_habilitadas_terapia_intermedia]" id="compra_camas_habilitadas_terapia_intermedia" @if ( $data['tipo'] == 'update') value="{{ $data['item']['compra_camas_habilitadas_terapia_intermedia'] }}" @endif/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingrese el Número de Camas Ocupadas en Terapia Intermedia.</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[compra_camas_ocupadas_terapia_intermedia]" id="compra_camas_ocupadas_terapia_intermedia" @if ( $data['tipo'] == 'update') value="{{ $data['item']['compra_camas_ocupadas_terapia_intermedia'] }}" @endif/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingrese el Número de Camas Habilitadas en Terapia Intensiva.</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[compra_camas_habilitadas_terapia_intensiva]" id="compra_camas_habilitadas_terapia_intensiva" @if ( $data['tipo'] == 'update') value="{{ $data['item']['compra_camas_habilitadas_terapia_intensiva'] }}" @endif/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ingrese el Número de Camas Ocupadas en Terapia Intensiva.</label>
                                <input type="text" class="form-control" placeholder="Ingrese un número" name="item[compra_camas_ocupadas_terapia_intensiva]" id="compra_camas_ocupadas_terapia_intensiva" @if ( $data['tipo'] == 'update') value="{{ $data['item']['compra_camas_ocupadas_terapia_intensiva'] }}" @endif/>
                            </div>
                        </div>
                    </div>

                </div>



            </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Guardar</button>
            <!-- <button type="reset" class="btn btn-secondary float-right mr-2">Cancelar</button> -->
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->

{{-- Scripts Section --}}

<script src="{{ asset('scripts/bancooxigeno/item/generacionoxigeno/index.js') }}" type="text/javascript"></script>






