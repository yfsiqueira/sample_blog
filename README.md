# sample_blog

Respostas:

Resiliência: O que fazer para mitigar possíveis erros e controlar os possíveis erros recebidos da API?

Primeiro, e antes de tudo é necessário que o projeto tenha padrão e que siga boas práticas, isso evita muitos problemas e em caso de bugs/erros, a manutenção é muito facilitada e em menos tempo. É muito importante que todas requisições sejam mapeadas e que cada usuário seja identificado de forma individual. Além de logs (tanto de sucesso, quanto de falha), é extremamente necessário que exista testes unitários, e uma boa equipe de Q.A. O monitoramente e supervisão do código, com PR e da aplicação em si, com ferramentas atuais (um bom exemplo dela é o SonarQube), nunca serão demais.


Performance: Quais boas práticas são aplicadas em banco de dados e no código para garantir performance?

Para garanir o desempenho do banco de dados, é muito importante inserir índices de forma correta, definir os tipos de dados correspondentes à cada coluna corretamente, estabelecer as chaves primárias. A arquitetura de projetos bem planejada e definida, um framework atual e completo, métodos sem duplicidade, uso de ORMs, testes unitários e validações de código e aplicação via PR e programas especializados (SonarQube), garantem um bom funcionamente e perfomance da aplicação de forma geral.


Segurança: Como garantir segurança para as APIs do sistema?

É muito importante definir acessos individuais para cada usuário, e rastrear cada acesso, tokens, como JWT, garantem mais segurança à aplicação e requisição. Muito imporante ter um gateway de api, pois possui monitoramente em tempo real, limitação de taxa, autenticações, e alertas. 


Simultaneidade: Como trabalhar com simultaneidade se milhares de requisições forem solicitadas simultaneamente?

A simultaneidade de uma aplicação vai desde a infraestrutura dos seus servidores, que precisa ter a escalabilidade necessária, para que não gere custos desnecessários quando a quantidade de requisições não é tão elevada, mas que garanta processamento suficiente para quando for exigido, o load balance é imprescindível para isso. Testes podem simular esse tipo de situação, um bom exemplo disso, é o teste de carga, que simula o aumento de requisições que uma aplicação recebe. 
