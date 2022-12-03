# correcciones:

los telefonos deben ser de 12 caracteres para admitir conjunto de numeros con este formato : (###) - (###) - (####)

# tablas esenciales ( no derivan ni dependen de ninguna otra ):

- instructores
- programas
- ambientes

# !interrogantes: 

- dia depende de horario, y horario depende de dia? (cardinalidad 1:1 porque ambos poseen la llave primaria del otro)
- dia depende de jornada, y jornada depende de dia? (cardinalidad 1:1 porque ambos poseen la llave primaria del otro)
- que representa realmente la entidad dia? como se clasifica

# ideas:

- seria mejor tener la base de datos que tiene el coordinador (solo el modelo sin la informacion es suficiente)
- dado que el coordinador ya tiene su aplicativo, subir unicamente la base de datos, conectar el aplicativo con esta y enfocarse en los usuarios secundarios (instructores, que tendran metodo de ingreso, aunque ya que sus funciones se limitan a el recibimiento y envio de informacion (informes y solicitudes respectivmente), esta tarea puede ser deducida por ellos mismos a traves de sus correos)