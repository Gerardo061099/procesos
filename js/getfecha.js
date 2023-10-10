    

    export function formatoFecha(fecha, formato) {
        const map = {
            dd: fecha.getDate(),
            mm: fecha.getMonth() + 1,
            yy: fecha.getFullYear().toString(),
            yyyy: fecha.getFullYear()
        }
        return formato.replace(/dd|mm|yy|yyy/gi, matched => map[matched])   
    }
    export function getfechaAnterior(fecha, formato) {
        const map = {
            dd: fecha.getDate()-1,
            mm: fecha.getMonth() + 1,
            yy: fecha.getFullYear().toString(),
            yyyy: fecha.getFullYear()
        }
        return formato.replace(/dd|mm|yy|yyy/gi, matched => map[matched])   
    }