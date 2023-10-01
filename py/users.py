import mysql.connector
from flask import Flask, render_template

# Conectando ao banco de dados MySQL
conexao = mysql.connector.connect(
    host="127.0.0.1",
    user="impacta",
    password="impacta@123",
    database="impacta"
)

# Verificando se a conexão foi bem-sucedida
if conexao.is_connected():
    print("Conexão ao MySQL bem-sucedida!")

    # Criando um cursor para executar consultas SQL
    cursor = conexao.cursor()

    # Criando a tabela 'condominos' se ela não existir
    cursor.execute("CREATE TABLE IF NOT EXISTS condominos ("
                   "id INT AUTO_INCREMENT PRIMARY KEY,"
                   "nome VARCHAR(255) NOT NULL,"
                   "cpf VARCHAR(11) NOT NULL,"
                   "email VARCHAR(255) NOT NULL,"
                   "fone_whatsapp VARCHAR(15) NOT NULL,"
                   "apartamento VARCHAR(10) NOT NULL,"
                   "bloco VARCHAR(10),"
                   "senha VARCHAR(255) NOT NULL"
                   ")")

    # Coletando dados do usuário
    nome = input("Digite seu nome: ")
    cpf = input("Digite seu CPF: ")
    email = input("Digite seu e-mail: ")
    fone_whatsapp = input("Digite seu telefone/WhatsApp: ")
    apartamento = input("Digite o número do apartamento: ")
    bloco = input("Digite o bloco (opcional, pressione Enter se não aplicável): ")
    senha = input("Digite sua senha: ")
    confirmar_senha = input("Confirme sua senha: ")

    # Verificando se as senhas coincidem
    if senha != confirmar_senha:
        print("As senhas não coincidem. Tente novamente.")
    else:
        # Inserindo os dados do condômino na tabela 'condominos'
        sql = "INSERT INTO condominos (nome, cpf, email, fone_whatsapp, apartamento, bloco, senha) " \
              "VALUES (%s, %s, %s, %s, %s, %s, %s)"
        val = (nome, cpf, email, fone_whatsapp, apartamento, bloco, senha)
        cursor.execute(sql, val)
        conexao.commit()
        print("Cadastro de condômino concluído com sucesso!")

    # Fechando o cursor e a conexão com o banco de dados
    cursor.close()
    conexao.close()

else:
    print("Falha na conexão ao MySQL. Verifique suas credenciais.")

app = Flask(__name__)

@app.route('H:\Meu Drive\IMPACTA\PROJETO\CODIGO\Impacta_project\py')
def index():
    return render_template('index.html')

@app.route('/processar', methods=['POST'])
def processar_formulario():
    nome = request.form['nome']
    cpf = request.form['cpf']
    email = request.form['email']
    fone_whatsapp = request.form['fone_whatsapp']
    apartamento = request.form['apartamento']
    bloco = request.form['bloco']
    senha = request.form['senha']
    confirmar_senha = request.form['confirmar_senha']
    # Faça algo com os dados (por exemplo, armazene em um banco de dados)
    return f"Nome: {nome}, CPF: {cpf}, Email: {email}, fone_whatsapp: {fone_whatsapp}, apartamento: {apartamento}, apartamento: {apartamento}, bloco: {bloco}, senha: {senha}, confirmar_senha: {confirmar_senha}"

if __name__ == '__main__':
    app.run()

