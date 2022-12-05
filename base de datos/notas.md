# IMPORTANTE

- de cada programa derivan varias fichas
- las fichas, los instructores y los ambientes se conectan en las competencias
- de cada competencia derivan varios resultados
- el instructor de FICHA y el instructor de COMPETENCIAS TIENEN NIVELES JERARQUICOS DIFERENTES
- hice que horario jornada y dias dejen de ser entidades necesarias, puesto que no entendi su funcionamiento (hice que idjoranada puediera ser nulo en la declaracion de una competencia): para crear una competencia necesitas una jornada, para crear una jornada un dia, para un dia un horario, pero para un horario un dia y una jornada? es imposible crear registros en esas 3 tablas.

# correcciones:

- los telefonos deben ser de 12 caracteres para admitir conjunto de numeros con este formato : (###) - (###) - (####)

- una misma competencia puede ser dada por varios profesores distintos y un instructor puede dar varias competencias, asi que se inhabilita el campo idinstructor de competecia y se deja la tabla instructor/competencia

# tablas esenciales ( no derivan ni dependen de ninguna otra ):

1. instructores
2. programas
3. ambientes 

# !interrogantes: 

- dia depende de horario, y horario depende de dia? (cardinalidad 1:1 porque ambos poseen la llave primaria del otro)
- dia depende de jornada, y jornada depende de dia? (cardinalidad 1:1 porque ambos poseen la llave primaria del otro)
- que se comprende como jornada?
- que representa realmente la entidad dia? como se clasifica 
- en general, como plantea esta base de datos el manejo de los horarios como estructuras temporales?
- porque la relacion joranada/competencia no es una tabla si la segunda posee la llave de la primera?
- hay que añadir el campo duracion a los resultados?

# ideas:

- seria mejor tener la base de datos que tiene el coordinador (solo el modelo sin la informacion es suficiente)
- dado que el coordinador ya tiene su aplicativo, subir unicamente la base de datos, conectar el aplicativo con esta y enfocarse en los usuarios secundarios (instructores, que tendran metodo de ingreso, aunque ya que sus funciones se limitan a el recibimiento y envio de informacion (informes y solicitudes respectivmente), esta tarea puede ser deducida por ellos mismos a traves de sus correos)
- la entidad asignacion sera cada una de las unidades de informacion que se mostrara en los horarios. relacionara una resultado (< competencia < ficha+instructor+ambiente < programa + instructor) con una semana, un dia de semana y una hora de inicio.
