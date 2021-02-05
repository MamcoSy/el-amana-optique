<style>
  * {
    margin: 0;
    padding: 0;
    font-family: 'Arial';
  }

  h2,
  p {
    margin: 1mm;
  }

  p {
    font-size: 4mm;
  }

  .ar {
    font-family: 'aealarabiya';
    direction: rtl;
  }

  .italic {
    font-style: italic;
  }

  table {
    /* border: 1mm solid #000; */
    padding: 5mm 0;
    width: 100%;
  }

  .table1 td {
    width: 50%;
  }

  .table2 td {
    width: 50%;
    padding: 2mm 0;
  }

  .mt-5 {
    margin-top: 5mm;
  }

  .underline {
    text-decoration: underline;
  }

  .right {
    text-align: right;
  }

  .left {
    text-align: left;
  }

  .center {
    text-align: center;
  }

  .fz-4 {
    font-size: 4mm;
  }

  .content {
    font-size: 5mm;
    width: 80%;
    margin: 30mm;
    margin-top: 10mm;
  }

  .content2 {
    font-size: 5mm;
    width: 80%;
    margin-right: 20mm;
    margin-left: 20mm;
    margin-top: 10mm;
  }
</style>

<page>
  <page_header>
    <table class="table1">
      <tr>
        <td>
          <h2>El Amana Optique</h2>
          <!-- <p>Maladie des yeux</p>
          <p>48 00 12 48 - 49 72 61 81</p> -->
        </td>
        <td class="right">
          <h2 class="ar">الأمانة للنظارات</h2>
          <!-- <p class="ar">المراض الءيون</p>
          <p>48 00 12 48 - 49 72 61 81</p> -->
        </td>
      </tr>
    </table>
    <hr>
    <?php $time = strtotime($invoice->i_created_at)?>
    <table class="table2">
      <tr>
        <td>
          <p class="left">Client: <?=$invoice->i_client_name?>
          </p>
        </td>
        <td>
          <p class="right">Date: <?=date('d / m / Y', $time)?>
          </p>
        </td>
      </tr>
    </table>
    <h1 class="center underline mt-5">FACTURE N: <?=sprintf('%07d', $invoice->id)?>
    </h1>
    <div class="content2">
      <table class="table2">
        <tr>
          <td>
            <p class="left">
              OG : <?=$invoice->i_left_eye?>
            </p>
          </td>
          <td>
            <p class="">
              Prix&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?=$invoice->i_left_eye_price?>
            </p>
          </td>
        </tr>
        <tr>
          <td>
            <p class="left">
              OD: <?=$invoice->i_right_eye?>
            </p>
          </td>
          <td>
            <p class="">
              Prix&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?=$invoice->i_right_eye_price?>
            </p>
          </td>
        </tr>
        <tr>
          <td>
            <p class="left">

            </p>
          </td>
          <td>
            <p class="">
              Monture&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?=$invoice->i_mount_price?>
            </p>
          </td>
        </tr>
        <hr width="4">
        <tr>
          <td>
            <p class="left">

            </p>
          </td>
          <td>
            <p class="">
              Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?=$invoice->i_amount_to_pay?> MRU
            </p>
          </td>
        </tr>
      </table>
    </div>
  </page_header>
  <page_footer>
    <table class="table2">
      <tr>
        <td>
          <p class="left">

          </p>
        </td>
        <td>
          <p class="right">
            Somme payé : <?=$invoice->i_paid_amount?>
          </p>
        </td>
      </tr>
    </table>
    <!-- TODO: tasnlate to arabic -->
    <hr>
    <table class="table2">
      <tr>
        <td>
          <p class="left">
            Marcheé Esselam-Boutique N<sup>o</sup>C27/C29/C30 <br />
            Tél: 25042425-22486770-49262624-46396767<br />
            C.R:65302 - BP:2166<br />
            Nouakchott Mauritanie<br />
            E-mail:hamadielkhay@gmail.com
          </p>
        </td>
        <td>
          <p class="right ar">
            <sup>o</sup>C27/C29/C30  : سوق السلام <br />
            الهاتف : 25042425-22486770-49262624-46396767<br />
            C.R:65302 - BP:2166<br />
            انواكشوط - موريتانيا<br />
            <span dir="ltr">hamadielkhay@gmail.com </span> البريد :
          </p>
        </td>
      </tr>
    </table>
  </page_footer>
</page>