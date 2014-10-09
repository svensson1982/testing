<html>
<head>
	<title>Teszt</title>
    <!-- karakter kÛdol·s utf-8-->
    <meta charset="utf-8" >
	<!-- a js.js elˆbb lett betˆltve mint a jquery, Ìgy nem fog lefutni a js.js-ben megÌrt ajaxos kÈrÈs
    A jQuery nem volt 
    
    -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--<script type="text/javascript" src="js/jquery.js"></script>-->
    <script type="text/javascript" src="js/js.js"></script>
    <style type="text/css">
        .error-field1{
            display: inline-block;
            width: 300px;
        }
        .error-field2{
            display: inline-block;
            width: 300px;
        }
        .error1{
            border: 2px solid red;
        }
        .error2{
            border: 2px solid red;
        }
    </style>    
</head>
<body>
    <!-- It was class instead of id -->
	<table id="test_table">
		<thead>
			<tr>
				<th>N√©v</th><th>√ârt√©k (ar√°ny)</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
    <button id="add-input">Add input</button>
    <br><br>
    <!-- It was class instead of id-->
	<form id="test_form">
		<div>
			<input type="text" name="key[]" value="k0" required >: <input type="text" name="val[]" value="0" required >
		</div>
		<div>
			<input type="text" name="key[]" value="k1" required >: <input type="text" name="val[]" value="1" required >
		</div>
		<div>
                    <input type="text" name="key[]" value="k2" required >: <input type="text" name="val[]" value="2" required >
		</div>
        <!-- The input type it was button and not submit -->
        <input id="btn-form" type="submit" value="Go" />
	</form>
    <div class="error-field1"></div>
    <div class="error-field2"></div>
</body>
</html>