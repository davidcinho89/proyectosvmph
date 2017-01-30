<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>
<div class="container">
    <table width="97%" cellspacing="0" cellpadding="2" border="0" bgcolor="#369808">
        <tbody><tr>
                <td align="center">
                    <table width="97%">
                        <tbody><tr>
                                <td>
                                    <p class="text2"></p>
                                </td>
                            </tr>
                        </tbody></table>
                    <table width="97%" cellspacing="1" cellpadding="0" border="0" bgcolor="#48598a">
                        <tbody><tr bgcolor="#ffffff">
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="6" border="0">
                                        <tbody><tr>
                                                <td align="left" width="70%" valign="top">
                                                    <p>Apreciable <b><?php echo $nombreUser; ?></b></p><p>Orden número: <b><?php echo $facturaNum; ?></b></p><p>Gracias
                                                        por hacer sus compras en PLENTIFUL SAS SUEÑOS HECHOS REALIDAD. Para su 
                                                        informacion, las ordenes se envian generalmente dentro de un plazo de 72
                                                        horas siguientes al recibo de su pago.  
                                                    </p><p>Para ver el avance de tu orden de compra 
                                                        puedes enviar un correo electronico a compras.plentiful@gmail.com o 
                                                        comunicarte al telefono 5609479 
                                                    </p><p>Atentamente 
                                                    </p><p>Tu equipo Plentiful S.A.S 
                                                    </p><table align="center" width="95%" border="0">
                                                        <tbody><tr>
                                                                <td>
                                                                    <table align="left" width="75%">
                                                                        <tbody><tr>
                                                                                <td width="35%">Nombre</td>
                                                                                <td><b><?php echo $nombreUser; ?></b></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Vinculado No.</td>
                                                                                <td><b><?php echo $idUser; ?></b></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Orden No.</td>
                                                                                <td><b><?php echo $facturaNum; ?></b></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Fecha</td>
                                                                                <td><b><?php echo date("d-m-Y"); ?></b></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Puntos totales</td>
                                                                                <td><b><?php echo number_format($puntos,2, ',', '.'); ?></b></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tipo de envio:</td>
                                                                                <td><b><?php echo $tipoenvio; ?></b></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>PERIODO</td>
                                                                                <td><b><?php echo $mes; ?></b></td>
                                                                            </tr>                                                                       
                                                                        </tbody></table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" cellspacing="0" style="text-align: center;">
                                                                        <tbody><tr class="headall">
                                                                                <th class="headinit" style="width: 60px;">Cantidad</th>
                                                                                <th class="head" style="width: 95px;">Código</th>
                                                                                <th class="head">Articulo</th>
                                                                                <th class="head" style="width: 70px;">Puntos</th>
                                                                                <th class="head" style="width: 70px;">Total Puntos</th>
                                                                                <th class="head">Precio</th>
                                                                                <th class="head" style="width: 50px;">total</th>
                                                                            </tr>
                                                                            <?php foreach ($detalles as $detail) { ?>


                                                                                <tr class="class<?php echo $class; ?>">
                                                                                    <th class="init">
                                                                                        <?php echo $detail->getCantidad(); ?>
                                                                                    </th>
                                                                                    <th class="item">                                                                                        
                                                                                        <?php echo $detail->getProducto()->getReferencia(); ?>

                                                                                    </th>
                                                                                    <th class="item"> 
                                                                                        <?php echo $detail->getProducto()->getNombre(); ?>    
                                                                                    </th>
                                                                                    <th class="item"> 
                                                                                        <?php echo number_format($detail->getProducto()->getPuntos(),2, ',', '.'); ?>
                                                                                    </th>
                                                                                    <th class="item"> 
                                                                                        <?php echo number_format($detail->getCantidad() * $detail->getProducto()->getPuntos(),2, ',', '.'); ?>
                                                                                    </th>
                                                                                    <th class="item"> 
                                                                                        <?php
                                                                                        if ($detail->getProducto()->getIva() == 0) {
                                                                                            echo '&#36;' . number_format($detail->getProducto()->getPrecio(), 0, ',', '.');
                                                                                        } else {
                                                                                            echo '&#36;' . number_format((($detail->getProducto()->getPrecio() * 
                                                                                                    $detail->getProducto()->getIva()) / 100) + $detail->getProducto()->getPrecio(), 0, ',', '.');
                                                                                        }
                                                                                        ?>
                                                                                    </th>
                                                                                    <th class="item"> 
                                                                                        <?php
                                                                                        if ($detail->getProducto()->getIva() == 0) {
                                                                                            echo '&#36;' . number_format($detail->getCantidad() *
                                                                                                    $detail->getProducto()->getPrecio(), 0, ',', '.');
                                                                                        } else {
                                                                                            echo '&#36;' . number_format($detail->getCantidad() * 
                                                                                                    ((($detail->getProducto()->getPrecio() * $detail->getProducto()->getIva()) 
                                                                                                    / 100) + $detail->getProducto()->getPrecio()), 0, ',', '.');
                                                                                        }
                                                                                        ?>
                                                                                    </th>
                                                                                </tr> 
                                                                                <?php
                                                                                if ($class == 1) {
                                                                                    $class = 2;
                                                                                } else {
                                                                                    $class = 1;
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <tr>
                                                                                <th colspan="6" style="text-align: right; padding: 10px; font-size: 14px;" >
                                                                                    <strong>VALOR ANTES DE IVA</strong> 
                                                                                </th>
                                                                                <th class="init"> $<?php echo number_format($subtotal, 0, ',', '.'); ?></th>
                                                                            </tr>                                                                        
                                                                            <tr>
                                                                                <th colspan="6" style="text-align: right; padding: 10px; font-size: 14px;" >
                                                                                    <strong>VALOR IVA</strong>
                                                                                <th class="init"> $<?php echo number_format($iva, 0, ',', '.'); ?></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th colspan="6" style="text-align: right; padding: 10px; font-size: 14px;" >
                                                                                    <strong>TOTAL</strong>
                                                                                    <?php if ($iva != 0) { ?>
                                                                                    <th class="init"> $<?php echo number_format($subtotal + $iva, 0, ',', '.'); ?></th>
                                                                                <?php } else { ?>
                                                                                    <th class="init"> $<?php echo number_format($subtotal, 0, ',', '.'); ?></th>
                                                                                <?php } ?>
                                                                            </tr>
                                                                        </tbody></table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                </td>
                            </tr>
                        </tbody></table>                
                    <table width="85%" cellspacing="0" cellpadding="6" border="0">
                        <tbody>
                            <tr style="color: #fff;">
                                <td><b></b></td>
                                <td colspan="2"><b></b></td>
                                <td colspan="2"><b></b></td>
                            </tr>
                            <tr bgcolor="#ffffff" class="text2">
                                <td align="left">
                                    <font size="3"><b>Ficha de deposito</b></font>
                                </td>
                                <td align="center">
                                    <font size="3"><b>Numero de cuenta</b></font>
                                </td>
                                <td align="center">
                                    <font size="3"><b>Banco</b></font>
                                </td>
                                <td></td>
                                <td align="center">
                                    <font size="3"><b>Beneficiario</b></font>
                                </td>
                            </tr>
                            <tr bgcolor="#ffffff" class="text2">
                                <td align="center" valign="top"><img src="<?php echo $bogota; ?>"></td>
                                <td align="center" valign="top">
                                    <font size="3">422043612</font>
                                </td>
                                <td align="center" valign="top">
                                    <font size="3">
                                    Banco de Bogota
                                    </font>
                                </td>
                                <td></td>
                                <td align="center" valign="top">
                                    <font size="3">Plentiful</font>
                                </td>
                            </tr>
                            <tr bgcolor="#ffffff" class="text2">
                                <td align="left" valign="top" colspan="2">
                                    <font size="2">Usted puede pagar en cualquier Banco de Bogota</font>
                                </td>
                                <td align="right" valign="top" colspan="2" class="text2">
                                    <font size="3"><b>Valor total: 
                                        <?php if ($iva != 0) { ?>
                                            $<?php echo number_format($subtotal + $iva,0,',','.'); ?>
                                        <?php } else { ?>
                                            $<?php echo number_format($subtotal,0,',','.'); ?>
                                        <?php } ?>
                                    </b></font>
                                </td>
                                <td align="right" valign="top" class="text2">
                                    <font size="3"><b>Referencia: (<?php echo $facturaNum; ?>)
                                    </b></font>
                                </td>
                            </tr>
                            <tr style="color: #fff;">
                                <td>
                                    <b>Para confirmar el deposito</b></td>
                                <td colspan="2"><b>Email: compras.plentiful@gmail.com</b></td>
                                <td colspan="2"><b>Telefono: 5609479</b></td>
                            </tr>
                        </tbody>
                    </table>               
                </td>
            </tr>
            <tr>
                <td align="center">
                    <form action="index.php?controlador=Index&accion=Logo" target="contenido" method="post">
                    <button class="buscarButton"><?php $doc->texto('FINISH')?></button>
                    </form>
                </td>
            </tr>


        </tbody>
    </table>

</div>
