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
    margin-left: 30mm;
    margin-top: 10mm;
  }
</style>

<!-- FIXME : fix prescription header -->
<page>
  <page_header>
    <table class="table1">
      <tr>
        <td>
          <h2>El Amana Optique</h2>
          <p>Maladie des yeux</p>
          <p>48 00 12 48 - 49 72 61 81</p>
        </td>
        <td class="right">
          <h2 class="ar">ءيادة شاصوا</h2>
          <p class="ar">المراض الءيون</p>
          <p>48 00 12 48 - 49 72 61 81</p>
        </td>
      </tr>
    </table>
    <hr>
    <?php $time = strtotime($prescription->p_created_at)?>
    <table class="table2">
      <tr>
        <td>
          <p class="left">Client: <?=$prescription->p_client_name?>
          </p>
        </td>
        <td>
          <p class="right">Date: <?=date('d / m / Y', $time)?>
          </p>
        </td>
      </tr>
    </table>
    <h1 class="center underline mt-5">ORDONNANCE MEDICALE</h1>
    <div class="content">
      <p class="mt-5">OG: <?=$prescription->p_left_eye?>
      </p>
      <p class="mt-5">OD: <?=$prescription->p_right_eye?>
      </p>
      <p class="mt-5"><?=$prescription->p_content?>
      </p>
    </div>
  </page_header>
  <page_footer>
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
          <p class="right">
            <sup>o</sup>C27/C29/C30 <br />
            Tél: 25042425-22486770-49262624-46396767<br />
            C.R:65302 - BP:2166<br />
            Nouakchott Mauritanie<br />
            E-mail:hamadielkhay@gmail.com
          </p>
        </td>
      </tr>
    </table>
  </page_footer>
</page>