<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">電影票卷</th>
                <th style="width:10%">價格</th>
                <th style="width:8%">張數</th>
                <th style="width:22%" class="text-center">金額</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_price = 0;
            for($i = 0; $i < count($cart_res['cart_content']); $i++) {
              $content = $cart_res['cart_content'][$i];
              $movie = $content['movie'];
              $ticket = $content['ticket'];
              $number = $content['number'];
              //$datetime = new \DateTime($ticket->showing_time);
              echo '<tr>
                  <td data-th="Product">
                      <div class="row">
                          <div class="col-sm-3 hidden-xs"><img src="./imgs/movie/' . $movie->poster . '" alt="..." class="img-responsive" /></div>
                          <div class="col-sm-1"></div>
                          <div class="col-sm-8 align-self-center">
                              <h4 class="nomargin">' . $movie->zh_name . '</h4>
                              <p>場次: ' . \Tools\Date::toFormat(\Tools\Date::toTimeZone(\Tools\Date::toDateTime($ticket->showing_time)), 'Y/m/d H:i') . ' 座位:自由入座</p>
                          </div>
                      </div>
                  </td>
                  <td data-th="Price">NT$ 260</td>
                  <td data-th="Quantity">
                      <input type="number" class="form-control text-center" value="' . $number . '" onchange="cartCalPrice(' . str_replace("'", "", $ticket->id) . ', this.value, \'sub' . $i . '\')">
                  </td>
                  <td data-th="Subtotal" class="text-center">NT$ <text id="sub' . $i . '">' . $number * 260 . '</text></td>
                  <td class="actions" data-th="">
                      <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                  </td>
              </tr>';
              $total_price += $number * 260;
            }
            ?>

        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total NT$ <text id="Total1"><?php echo $total_price; ?></text></strong></td>
            </tr>
            <tr>
                <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total NT$ <text id="Total2"><?php echo $total_price; ?></text></strong></td>
                <td><a href="./checkout.php" class="btn btn-success btn-block">結帳 <i class="fa fa-angle-right"></i></a></td>
            </tr>
        </tfoot>
    </table>
</div>