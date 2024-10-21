import tkinter as tk
from tkinter import messagebox

class CampeonatoApp:
    def __init__(self, master):
        self.master = master
        master.title("Administração de Campeonato")

        # Variáveis
        self.num_jogadores = tk.IntVar()
        self.nomes = []
        self.pontuacoes = []

        # Layout
        self.label = tk.Label(master, text="Número de Jogadores:")
        self.label.pack()

        self.entry_num_jogadores = tk.Entry(master, textvariable=self.num_jogadores)
        self.entry_num_jogadores.pack()

        self.button_configurar = tk.Button(master, text="Configurar Jogadores", command=self.configurar_jogadores)
        self.button_configurar.pack()

        self.resultado_label = tk.Label(master, text="")
        self.resultado_label.pack()

    def configurar_jogadores(self):
        num = self.num_jogadores.get()
        if num < 1:
            messagebox.showerror("Erro", "Por favor, insira um número válido de jogadores.")
            return
        
        self.nomes = []
        self.pontuacoes = []
        self.janela_jogadores = tk.Toplevel(self.master)
        self.janela_jogadores.title("Inserir Nomes e Pontuações")

        for i in range(num):
            tk.Label(self.janela_jogadores, text=f"Jogador {i + 1} Nome:").grid(row=i, column=0)
            nome_entry = tk.Entry(self.janela_jogadores)
            nome_entry.grid(row=i, column=1)
            self.nomes.append(nome_entry)

            tk.Label(self.janela_jogadores, text="Pontuação:").grid(row=i, column=2)
            pontos_entry = tk.Entry(self.janela_jogadores)
            pontos_entry.grid(row=i, column=3)
            self.pontuacoes.append(pontos_entry)

        self.button_finalizar = tk.Button(self.janela_jogadores, text="Finalizar", command=self.finalizar)
        self.button_finalizar.grid(row=num, column=0, columnspan=4)

    def finalizar(self):
        try:
            pontos = [int(entry.get()) for entry in self.pontuacoes]
            nomes = [entry.get() for entry in self.nomes]

            ranking = sorted(zip(nomes, pontos), key=lambda x: x[1], reverse=True)

            resultado = "Ranking dos Jogadores:\n"
            for posicao, (nome, ponto) in enumerate(ranking, start=1):
                resultado += f"{posicao}. {nome} - {ponto} pontos\n"

            self.resultado_label.config(text=resultado)
            self.janela_jogadores.destroy()
        except ValueError:
            messagebox.showerror("Erro", "Por favor, insira pontuações válidas.")

if __name__ == "__main__":
    root = tk.Tk()
    app = CampeonatoApp(root)
    root.mainloop()
