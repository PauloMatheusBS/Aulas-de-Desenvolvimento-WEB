import tkinter as tk
from tkinter import messagebox, scrolledtext
from PIL import Image, ImageTk
import requests
from io import BytesIO

class CampeonatoApp:
    def __init__(self, master):
        self.master = master
        master.title("Administração de Campeonato")
        master.geometry("400x400")  # Tamanho da janela inicial

        # Carregar imagem
        if not self.carregar_imagem("https://via.placeholder.com/400x100"):  # Link da imagem
            messagebox.showwarning("Aviso", "Não foi possível carregar a imagem.")

        # Variáveis
        self.num_jogadores = tk.IntVar()
        self.jogadores = {}  # Dicionário para armazenar jogadores e suas pontuações
        self.historico = []  # Lista para armazenar os históricos

        # Layout
        self.label = tk.Label(master, text="Número de Jogadores:")
        self.label.pack(pady=10)

        self.entry_num_jogadores = tk.Entry(master, textvariable=self.num_jogadores)
        self.entry_num_jogadores.pack(pady=5)

        self.button_configurar = tk.Button(master, text="Configurar Jogadores", command=self.configurar_jogadores)
        self.button_configurar.pack(pady=10)

        self.resultado_label = tk.Label(master, text="")
        self.resultado_label.pack(pady=20)

        self.button_historico = tk.Button(master, text="Mostrar Histórico", command=self.mostrar_historico)
        self.button_historico.pack(pady=10)

    def carregar_imagem(self, url):
        try:
            response = requests.get(url)
            response.raise_for_status()  # Verifica se a requisição foi bem-sucedida
            img_data = response.content
            img = Image.open(BytesIO(img_data))
            img = img.resize((400, 100), Image.ANTIALIAS)  # Ajusta o tamanho da imagem
            self.img_tk = ImageTk.PhotoImage(img)
            img_label = tk.Label(self.master, image=self.img_tk)
            img_label.pack()
            return True
        except Exception as e:
            print(f"Erro ao carregar a imagem: {e}")
            return False

    def configurar_jogadores(self):
        num = self.num_jogadores.get()
        if num < 1:
            messagebox.showerror("Erro", "Por favor, insira um número válido de jogadores.")
            return
        
        self.janela_jogadores = tk.Toplevel(self.master)
        self.janela_jogadores.title("Inserir Nomes e Pontuações")

        # Limpa os jogadores antigos
        self.janela_jogadores.nomes = []
        self.janela_jogadores.pontuacoes = []

        for i in range(num):
            tk.Label(self.janela_jogadores, text=f"Jogador {i + 1} Nome:").grid(row=i, column=0)
            nome_entry = tk.Entry(self.janela_jogadores)
            nome_entry.grid(row=i, column=1)
            self.janela_jogadores.nomes.append(nome_entry)

            tk.Label(self.janela_jogadores, text="Pontuação:").grid(row=i, column=2)
            pontos_entry = tk.Entry(self.janela_jogadores)
            pontos_entry.grid(row=i, column=3)
            self.janela_jogadores.pontuacoes.append(pontos_entry)

        self.button_finalizar = tk.Button(self.janela_jogadores, text="Finalizar", command=self.finalizar)
        self.button_finalizar.grid(row=num, column=0, columnspan=4)

    def finalizar(self):
        try:
            for i in range(len(self.janela_jogadores.nomes)):
                nome = self.janela_jogadores.nomes[i].get().strip()  # Remove espaços em branco
                pontos = int(self.janela_jogadores.pontuacoes[i].get())

                if nome:  # Verifica se o nome não está vazio
                    if nome in self.jogadores:
                        self.jogadores[nome] += pontos  # Acumula a pontuação
                    else:
                        self.jogadores[nome] = pontos  # Adiciona novo jogador

            ranking = sorted(self.jogadores.items(), key=lambda x: x[1], reverse=True)

            resultado = "Ranking dos Jogadores:\n"
            for posicao, (nome, ponto) in enumerate(ranking, start=1):
                resultado += f"{posicao}. {nome} - {ponto} pontos\n"

            self.resultado_label.config(text=resultado)
            self.historico.append(resultado)  # Armazena o resultado no histórico
            self.janela_jogadores.destroy()
        except ValueError:
            messagebox.showerror("Erro", "Por favor, insira pontuações válidas.")

    def mostrar_historico(self):
        historico_janela = tk.Toplevel(self.master)
        historico_janela.title("Histórico de Competições")
        
        text_area = scrolledtext.ScrolledText(historico_janela, wrap=tk.WORD, width=50, height=15)
        text_area.pack(pady=10)

        if not self.historico:
            text_area.insert(tk.END, "Nenhum histórico disponível.\n")
        else:
            for entrada in self.historico:
                text_area.insert(tk.END, entrada + "\n\n")
        
        text_area.config(state=tk.DISABLED)  # Torna a área de texto somente leitura

if __name__ == "__main__":
    root = tk.Tk()
    app = CampeonatoApp(root)
    root.mainloop()


