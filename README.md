# Companhia_de_onibus



Aqui ele vai contar quantos assentos já foram comprado!
`SELECT COUNT(ast.id) FROM assento ast INNER JOIN onibus bus ON ast.onibus_id = bus.id;`


Aqui ele vai trazer as viagens disponivel !

``  
    SELECT 
    	vg.id,
        vg.origem,
        vg.destino,
        vg.partida_dt,
        vg.chegada_dt,
        vg.valor,
        bus.numero as onibus,
        bus.max_assento,
    FROM VIAGEM vg
    	INNER JOIN onibus bus
        	ON bus.id = vg.onibus_id
``    
        

