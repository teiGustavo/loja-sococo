### Loja Inspiração: [loja.sococo.com.br](https://loja.sococo.com.br)

### Tarefas obrigatórias:
- [x] Cabeçalho e Rodapé configurado para aparecer em todas as páginas da loja virtual
- No rodapé deve ter:
  - Um menu institucional com os seguintes links:
    - [x] Quem Somos
    - [x] Política de Privacidade
    - [x] Política de Envio
    - [x] Política de Troca e Devolução
  - [x] Formas de pagamentos aceitas
  - [x] Horário de atendimento ao cliente
  - [x] Redes sociais
- [x] Sistema de busca de produtos
- [x] Menu principal com pelo menos 6 itens de menu
- [x] Slideshow com pelo menos 3 banners na página principal
- [x] Criação de pelo menos 5 categorias de produtos
- [x] Cadastro de pelo menos 10 produtos
- [x] Uma forma de envio configurada
- [x] Uma forma de pagamento configurada
- [x] Configuração da página de produto. Exibir as informações básicas e um slideshow com os
produtos relacionados
- [x] Editar o e-mail que é enviado para o cliente quando o pedido está sendo processado. Crie
um cupom de 10% de desconto e informe o código deste cupom neste e-mail para que ele
possa comprar um novo item. Informe que o cupom é válido por apenas 24 horas
- [x] Captação de depoimentos de clientes. Exibição destes depoimentos na página principal
(Sugestão de plugin: Strong Testimonials)
- [x] Botão de WhatsApp (Sugestão de plugin: Click to Chat)
- [x] Cupom de 10% de desconto para a primeira compra
- Configuração de carrinho abandonado (Sugestão de plugin: WooCommerce Cart
Abandonment Recovery):
  - [x] Configure para que seja disparado um e-mail 4 horas após o abandono do carrinho
perguntando ao cliente se ele teve alguma dificuldade e se o mesmo precisa de ajuda
  - [x] Configure para que seja disparado um e-mail 36 horas após o abandono do carrinho
enviando um cupom de 5% de desconto gerado e aplicado ao carrinho automaticamente
- [x] Sistema de gestão de lista de desejos (Sugestão de plugin: YITH WooCommerce Wishlist)
- [x] Implementação de alguma funcionalidade extra a sua escolha

### Funções extras implementadas:
- Página personalizada de Loja (Produtos), Produto Individual, Categoria(s), Carrinho, Checkout e Thank-you. 
- Formulário de inscrição na Newsletter.
- Página de visualização rápida do produto.
- Carousel de produtos vistos recentemente.

### Observações:
- Somente é necessário subir o `docker compose up -d` para iniciar o projeto.
- Acessar o site em `http://localhost:80` e o phpmyadmin em `http://localhost:8080`.
- Para acessar o painel administrativo do WordPress, utilize as seguintes credenciais:
  - Usuário: _admin_
  - Senha: _12345678_
- Pode ser necessário reiniciar os containers do Docker caso ocorra algum erro de conexão com o banco de dados. Para isso, utilize o comando `docker compose restart`.
- Caso ocorra algum erro de permissão (o que não deveria), copie os comandos definidos no arquivo `Dockerfile` e execute-os diretamente no terminal do container do Wordpress (`docker exec -it [nome_do_container] bash`).
- Foi enviado e mantido toda a pasta do wordpress para facilitar o desenvolvimento e evitar retrabalho na hora de compartilhar.
- Os dados de produtos (como categorias, imagens, etc.) foram importados via plugin `Product Import Export for WooCommerce` (pois o importador CSV do Wordpress estava enfrentando dificuldades para resolver as imagens). Os dados foram obtidos por web-scrapping do site original (veja `./web-scrapping` para ter acesso às configurações utilizadas).

Durante o desenvolvimento, algum dos plugins que testei acabou corrompendo o banco de dados do Wordpress (com alguns arquivos), o que me tomou alguns dias de correção (mesmo desenvolvendo com Docker e backups recorrentes), então, não tive como dar muita atenção para a responsividade, desculpe.