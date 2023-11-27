/**
 * 
 */

class MateriaPrima{
    constructor (nombre,cantidad){
        this.nombre = nombre,
        this.cantidad = cantidad
    }
    getNombre() {
        return this.nombre
    }
    getCantidad() {
        return this.cantidad
    }
    setNombre(newnombre) {
        this.nombre = newnombre
    }
    setCantidad(newcantidad) {
        this.cantidad = newcantidad
    }
}

export class Remanente extends MateriaPrima {
    constructor (nombre,descripcion,cantidad){
        super(nombre,cantidad)
        this.descripcion = descripcion
    }
    getDescripcion() {
        return this.descripcion
    }
    setDescripcion(newdescripcion) {
        this.descripcion = newdescripcion
    }
    
}

