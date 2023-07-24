import AirDatepicker from 'air-datepicker';
import 'air-datepicker/air-datepicker.css';
import localeEn from 'air-datepicker/locale/en';


new AirDatepicker('#date',{
    locale: localeEn,
    range: true,
    multipleDatesSeparator: " - ",
});