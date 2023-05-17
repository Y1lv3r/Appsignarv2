var start_date = null,
	end_date = null;
var timestamp_start_date = null,
	timestamp_end_date = null;
var $input_start_date = null,
	$input_end_date = null;
$.datepicker.regional['es'] = {
	closeText: 'Cerrar',
	prevText: 'Anterior',
	nextText: 'Siguiente',
	currentText: 'Hoy',
	monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
		'Octubre', 'Noviembre', 'Diciembre'
	],
	monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
	dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
	weekHeader: 'Sm',
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);

function getDateClass(date, start, end) {
	if (end != null && start != null) {
		if (date > start && date < end)
			return [true, "sejour", "Días Asignados"];
	}

	if (date == start)
		return [true, "start", "Fecha Inicio"];
	if (date == end)
		return [true, "end", "Fecha Fin"];

	return false;
}

function datepicker_draw_nb_nights() {
	var $datepicker = jQuery("#ui-datepicker-div");
	setTimeout(function () {

		var $qty_days_stay = jQuery("<div />", {
			class: "ui-datepicker-stay-duration"
		});
		var qty_nights_stay = get_days_difference(timestamp_start_date, timestamp_end_date);
		$qty_days_stay.text(" APPSIGNAR");
		$qty_days_stay.appendTo($datepicker);

	});
}

var options_start_date = {
	defaultDate: "+1w",
	changeMonth: false,
	showAnim: false,
	constrainInput: true,
	numberOfMonths: 2,
	showOtherMonths: true,
	showWeek: true,
	firstDay: 1,
	minDate: 0,
	maxDate: "+12M",
	dateFormat: "yy-mm-dd",

	beforeShow: function (input, datepicker) {
		datepicker_draw_nb_nights();
	},
	beforeShowDay: function (date) {
		// 0: published
		// 1: class
		var dayOfWeek = date.getDay();
		// 0 : Sunday, 1 : Monday, ...	 
		// 2: tooltip
		var timestamp_date = date.getTime();
		var result = getDateClass(timestamp_date, timestamp_start_date, timestamp_end_date);
		if (result != false)
			return result;
		if (dayOfWeek == 0 || dayOfWeek == 6)
			return [false];
		return [true, "", "Seleccione Fecha Inicio!"];

		return [true, "", ""];

		// return [ true, "chocolate", "Chocolate! " ];
	},
	onSelect: function (date_string, datepicker) {
		// this => input
		start_date = $input_start_date.datepicker("getDate");
		timestamp_start_date = start_date.getTime();
	},
	onClose: function () {
		if (end_date != null) {
			if (timestamp_start_date >= timestamp_end_date || end_date == null) {
				$input_end_date.datepicker("setDate", null);
				end_date = null;
				timestamp_end_date = null;
				$input_end_date.datepicker("show");
				return;
			}
		}
		if (start_date != null && end_date == null)
			$input_end_date.datepicker("show");
	}
};
var options_end_date = {
	defaultDate: "+1w",
	changeMonth: false,
	showAnim: false,
	constrainInput: true,
	numberOfMonths: 2,
	showOtherMonths: true,
	showWeek: true,
	firstDay: 1,
	minDate: 0,
	maxDate: "+12M",
	dateFormat: "yy-mm-dd",

	beforeShow: function (input, datepicker) {
		datepicker_draw_nb_nights();
	},
	beforeShowDay: function (date) {
		var dayOfWeek = date.getDay();
		// 0 : Sunday, 1 : Monday, ...
		var timestamp_date = date.getTime();
		var result = getDateClass(timestamp_date, timestamp_start_date, timestamp_end_date);
		if (result != false)
			return result;
		if (dayOfWeek == 0 || dayOfWeek == 6)
			return [false];
		return [true, "", "Seleccione Fecha Fin!"];
		return [true, "", "Seleccione Fecha Fin!"];
	},
	onSelect: function (date_string, datepicker) {
		// this => input
		end_date = $input_end_date.datepicker("getDate");
		timestamp_end_date = end_date.getTime();
	},
	onClose: function () {
		if (end_date == null)
			return;

		if (timestamp_end_date <= timestamp_start_date || start_date == null) {
			$input_start_date.datepicker("setDate", null);
			start_date = null;
			timestamp_start_date = null;
			$input_start_date.datepicker("show");
		}
	}
};

$input_start_date = jQuery("#start-date");
$input_end_date = jQuery("#end-date");

$input_start_date.datepicker(options_start_date);
$input_end_date.datepicker(options_end_date);

function get_days_difference(start_date, end_date) {
	return Math.floor(end_date - start_date) / (1000 * 60 * 60 * 24);
}