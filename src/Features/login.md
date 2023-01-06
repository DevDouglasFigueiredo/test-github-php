@login
Funcionalidade: Tela de login

  Como usuario do site Github
  Quero me autenticar
  Para ter acesso a minha conta de usuario

  @loginSucesso
  Cenário: Validar credenciais de login
    Dado que acesso o site do github
    E preencho com meu email valido
    E a senha valida
    Quando clico no botao
    Entao sou redirecionado para tela de usuario
