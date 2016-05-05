<?php

$actividades = $helpers->getQuery("SELECT a.id, a.actividad, p.proyecto, c.cliente, e.etapa, e.id as id_etapa, a.status, a.timestamp, ch.consultor AS html, cp.consultor AS progra, cc.consultor AS calidad, g.consultor AS gerencia
                                  FROM tbl_actividades AS a
                                  LEFT JOIN tbl_proyectos AS p ON (p.id = a.proyecto_id) 
                                  LEFT JOIN tbl_clientes AS c ON (c.id = p.cliente_id) 
                                  LEFT JOIN tbl_etapa AS e ON (e.id = a.etapa_id) 
                                  LEFT JOIN tbl_consultor AS ch ON (ch.id = a.consultor_html) 
                                  LEFT JOIN tbl_consultor AS cp ON (cp.id = a.consultor_progra) 
                                  LEFT JOIN tbl_consultor AS cc ON (cc.id = a.consultor_calidad) 
                                  LEFT JOIN tbl_consultor AS g ON (g.id = a.gerente) 
                                  WHERE a.status = 1 AND p.status = 1 AND p.status = 1 AND DATE(a.timestamp) = DATE(NOW()) ORDER BY e.id, c.cliente, p.proyecto, a.actividad ASC");

$actividadesFijas = $helpers->getQuery("SELECT a.id, a.actividad, p.proyecto, c.cliente, a.status, a.timestamp, g.consultor AS gerencia
                                  FROM tbl_actividades_fijas AS a
                                  LEFT JOIN tbl_proyectos AS p ON (p.id = a.proyecto_id) 
                                  LEFT JOIN tbl_clientes AS c ON (c.id = p.cliente_id) 
                                  LEFT JOIN tbl_consultor AS g ON (g.id = a.gerente) 
                                  WHERE a.status = 1 AND p.status = 1 AND p.status = 1 AND DATE(a.timestamp) = DATE(NOW()) ORDER BY c.cliente, p.proyecto, a.actividad ASC");



$concluidas = $helpers->getQuery("SELECT COUNT(id) as total FROM tbl_actividades WHERE etapa_id = 5 AND DATE(timestamp) = DATE(NOW())");

