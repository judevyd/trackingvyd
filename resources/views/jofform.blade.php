<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              Order Details
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 order-no">
                            <div>ORDER No. : <span class="order-name">ORDER#16992</span></div>
                            <div>Reference No. : <span class="order-name">REF#190000000001</span></div>
                        </div>
                        <div class="col-6 jof-no-div">
                            <div><span class="jof-no">JOF#: 190000000001</span></div>
                            <div><span class="due-date">Due Date : Oct. 04, 2019</span></div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2 order-details">
                            <div>Distributor: </div> 
                            <div>Customer Name:</div> 
                        </div>
                        <div class="col-4 order-details">
                            <div>Gabriel Ring Company</div>
                            <div>Christina Reasbeck</div>
                        </div>
                        <div class="col-2 order-details">
                            <div>Date Prepared: </div> 
                            <div>Due Date:</div> 
                            <div>Prepared By:</div> 
                        </div>
                        <div class="col-4 order-details">
                            <div>Sep. 24 2019</div>
                            <div>Oct. 04 2019</div>
                            <div>Kenneth Luansing</div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2 order-details">
                            <div>Kind :</div> 
                        </div>
                        <div class="col-4 order-details">
                            <div>Ring Template</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 ring-details">
                            <div>Metal :</div> 
                            <div>Ring Size :</div> 
                            <div>Year :</div> 
                            <div>Karat :</div> 
                            <div>Text Style :</div> 
                            <div>Quantity :</div> 
                        </div>
                        <div class="col-4 ring-details">
                            <div>10KYG</div>
                            <div>13</div>
                            <div>2019</div>
                            <div>10KYG</div>
                            <div>Block</div>
                            <div>1</div>
                        </div>
                        <div class="col-2 ring-details">
                            <div>Stone : </div> 
                            <div>Bridge :</div> 
                            <div>Weight :</div> 
                            <div>Oxidation :</div>
                            <div>Inside Engrave :</div>
                        </div>
                        <div class="col-4 ring-details">
                            <div>Facet Emerald</div>
                            <div>-</div>
                            <div>16 Grams</div>
                            <div>Oxi</div>
                            <div>01.08.1984</div>
                        </div>
                    </div>
                    <br>
                    <div class="row shank-details-hdr">
                        <div class="col shanks-details">
                         Left Shank
                        </div>
                        <div class="col shanks-details">
                         Top Details
                        </div>
                        <div class="col shanks-details">
                         Right Shank
                        </div>
                    </div>
                    <div class="row shank-details-body">
                        <div class="col shanks-details">
                         Established <br> 1855
                        </div>
                        <div class="col shanks-details">
                         P. Flanigan <br> & Sons
                        </div>
                        <div class="col shanks-details">
                         Archie <br> 35 Years
                        </div>
                    </div>
                    <br>
                    <div class="row ring-att">
                        <div class="col remarks">Remarks: See Attach Artwork</div>
                    </div>
                    <div class="row ring-attachment">
                        <div class="col-2"></div>
                        <div class="col-8 ring-img"><img src="img/3d-ring-design.png" class="img-fluid" alt="Ring Image"></div>
                        <div class="col-2"></div>
                    </div>
                    <br><br>
                    <div class="row foot-remarks">
                        <div class="col">
                            <div>Receiving</div>
                            <div>Mould</div>
                            <div>Plastic</div>
                            <div>Metal</div>
                            <div>Wax</div>
                            <div>Treeing</div>
                            <div>Casting</div>
                        </div>
                        <div class="col">
                            <div>Smithing</div>
                            <div>Pre-Polishing</div>
                            <div>Stone Setting</div>
                            <div>Final Polish</div>
                            <div>Finishing</div>
                            <div>Dispatching</div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
</body>
</html>
<style>
body {
    text-transform: uppercase;
    font-family: Arial !important;
    font-size: 14px;
}
@media print {
  
}
.row.shank-details-body>div {
    font-weight: normal !important;
}
.card {
    border-radius: 0px !important;
}
span.order-name {
    color: green;
}
.row.ring-att {
    margin: 10px 0px;
}
.col.remarks {
    font-weight: bold;
    font-size: 20px;
    margin: auto;
}
.col.att-artwork {
    background: black;
    color: white;
    padding: 8px;
    font-size: 20px;
    text-align: left !important;
}
.col-8.ring-img {
    text-align: center;
}
span.jof-no {
    font-size: 28px !important;;
    font-weight: bold;
    color: #007cb9;
}
span.fb-sales {
    font-size: 20px !important;;
    font-weight: bold;
    color: #007cb9;
}
.col-6.jof-no-div {
    text-align: center;
}
.order-details, .ring-details {
    font-weight: bold;
}
.col-8.ring-img>img {
    max-width: 100%;
    width: 100%;
}
.col-6.order-no {
    font-weight: bold;
}
span.due-date {
    color: red;
    font-weight: bold;
    font-size: 20px;
}
.container-fluid {
    padding: 0px !important;
}
.col.shanks-details {
    text-align: center;
    font-weight: bold;
    font-size: 16px;
}
.row.shank-details-hdr {
    padding: 15px 0px;
    background: black;
    color: white;
}
.row.shank-details-body {
    margin: 10px 0px;
}
.row.foot-remarks>.col>div {
    font-size: 15px;
    padding: 10px 0px 10px;
    border-bottom: 1px solid #cecece;
}

</style>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
