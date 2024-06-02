# Komorebi
Projeto feito como trabalho de conclusão do curso de Técnico em Informática integrado ao Ensino Médio, pelo IFPR campus Umuarama.
Feito quase inteiramente com PHP puro, mas também com um pouco de JavaScript. Bootstrap, HTML e CSS foram usados pra parte front-end.

A ideia é ser um site semelhante a Steam, isto é, uma plataforma online para jogos, com uma diferença: é por assinatura, assim como o Game Pass, por exemplo. 
Obviamente, o sistema de pagamento não é funcional e tem apenas algumas verificações básicas.

Os maiores desafios do trabalho foram, com certeza, as operações feitas no banco de dados. Para cadastrar o jogo, por exemplo, precisavam ser puxados todos os gêneros, empresas e desenvolvedoras cadastradas, mas não mostrar pelo ID e sim pelo nome. Fazer a biblioteca (local que mostra todos os jogos assinados pelo usuário) também foi mais difícil do que parece.

Foi um bom projeto, aprendi muitos conceitos iniciais e quebrei a cabeça pensando em como integrar diferentes tabelas do BD. Apesar de eu não ser um grande fã de web dev, digo com tranquilidade que foi satisfatório ver tudo rodando.

## Um dos meios de rodar e testar:
1. Baixar e rodar o [XAMPP](https://www.apachefriends.org/)
2. Iniciar Apache e MySQL
3. Ir para [localhost/phpmyadmin](http://localhost/phpmyadmin)
4. Carregar o banco de dados (komorebi.sql)
5. Colocar a pasta 'komorebi' na sua pasta htdocs
6. Ir até [localhost/komorebi](http://localhost/komorebi)
