import tkinter
import tkinter as tk
import math
import tkinter.font as tkFont


COLOR = '#36393E'


def inicjalizacjaOkienka():
    root = tkinter.Tk()
    root.geometry('360x600')
   # root.geometry("")
    root.minsize(360, 600)
    root.iconbitmap("pobrane2.ico")
  #  root.maxsize(800, 800)
  #  root.resizable(0, 0)
    root.title('Calculator')
  #  root.wm_attributes('-toolwindow', 'True')
    root.iconphoto(False, tk.PhotoImage(file='pobrane.png'))
    root.columnconfigure(tuple(range(4)), weight=1)
    root.rowconfigure(tuple(range(5)), weight=1)
    root.configure(background='#17181a')
    return root


def czyPoprawnyOstatniZnak(tekst):
    if tekst == '':
        return False
    else:
        i = 1
        while tekst[-i] == ')':
            i += 1
        return tekst[-i].isdigit()


def inicjalizacjaEkranu(root):
    ekran = [tkinter.Label(root, bg='#17181a', width=45, anchor='e', font='Calibri 25', borderwidth=2, foreground='#bfbfbf') for i in range(1)]
    for i in range(1):
        ekran[i].grid(row=1, columnspan=4, sticky='ews')
    return ekran


def inicjalizacjaPolaNaDane(root, ekran):
    pole_na_dane = tkinter.Entry(root, borderwidth=0, bg='#17181a', highlightcolor='white',
                                     highlightbackground='white', font='Calibri 45', justify="right",
                                     foreground='white')
    pole_na_dane.grid(row=2, columnspan=4, sticky='new')
    return pole_na_dane


def inicjalizacjaPrzycisków(root, ekran):
    symbole = ['%', 'CE', 'C', '\u21BA', '\u221A', 'x\u00B2', '\u00F7', '\u00D7', '7', '8', '9', '-', '4', '5', '6', '+', '1',
               '2', '3', '', "\u00B1", '0', '.']

    przyciski = []
    for symbol in symbole:
        if symbol == '7' or symbol == '8' or symbol == '9' or symbol == '4' or symbol == '5' or symbol == '6' or \
                symbol == '1' or symbol == '2' or symbol == '3' or symbol == '\u00B1' or symbol == '0' or symbol == '.':
            btn = tkinter.Button(root, text=symbol, bg='#1a1c1f', borderwidth=0, activebackground='#141517',
                       activeforeground='white', foreground='white', font="Calibri 16", height=1,
                       width=1, cursor="hand2")
        elif symbol == 'CE' or symbol == 'C' or symbol == '\u21BA':
            btn = tkinter.Button(root, text=symbol, bg='#222427', borderwidth=0, activebackground='#191a1c',
                       activeforeground='#91311c', foreground='#91311c', font="Calibri 16", height=1,
                       width=1, cursor="hand2")
        else:
            btn = tkinter.Button(root, text=symbol, bg='#222427', borderwidth=0, activebackground='#191a1c',
                       activeforeground='white', foreground='white', font="Calibri 16", height=1,
                       width=1, cursor="hand2")
        przyciski.append(btn)



    # 262e30
    j = 6
    for i in range(23):
        if i == 19:
            continue
        if i % 4 == 0:
            j += 1
        przyciski[i].grid(row=j, column=i % 4, pady=0, padx=0, ipady=15, ipadx=15, sticky='nsew')
        przyciski[i].configure(command=przyciskKlik(pole_na_dane, przyciski[i]['text'], ekran))


    znak_rownosc = tkinter.Button(root, text='=', bg='#c7a020', activebackground='#7d6518', activeforeground='black',
                                  foreground='black', font="Calibri 16", borderwidth=0, height =1, width= 1, cursor="hand2",
                                  command=oblicz(pole_na_dane, ekran))
    znak_rownosc.grid(row=11, column=3, pady=0, rowspan=2, padx=0, ipady=49, ipadx=15, sticky='nsew')

    def on_enter(event):
        event.widget['background'] = '#997c1c'


    def on_leave(event):
        event.widget['background'] = '#c7a020'

    znak_rownosc.bind("<Enter>", on_enter)
    znak_rownosc.bind("<Leave>", on_leave)

    return przyciski


def przyciskKlik(pole_na_dane, symbol, ekran):
    def f():
        tekst = pole_na_dane.get()
        if tekst == 'Przepełnienie':
            pole_na_dane.delete(0, tkinter.END)
        if tekst == 'Error':
            pole_na_dane.delete(0, tkinter.END)
        if symbol == '\u21BA':
            tekst = pole_na_dane.get()[:-1]
            pole_na_dane.delete(0, tkinter.END)
            pole_na_dane.insert(tkinter.END, tekst)
        elif '\u00F7' in tekst and '\u00D7' in tekst:
            cos = tekst
            for i in range(len(tekst)):
                if tekst[i] == '\u00F7':
                    wynik = str(eval(tekst[:i] + '/' + tekst[i + 1]))
                    pole_na_dane.delete(0, tkinter.END)
                    ekran[-1]['text'] = str(cos[:i] + '\u00F7' + cos[i+1]) + ' = ' + str(wynik)
                    pole_na_dane.insert(0, wynik + str('\u00D7'))
                if tekst[i] == '\u00D7':
                    wynik = str(eval(tekst[:i] + '*' + tekst[i + 1]))
                    pole_na_dane.delete(0, tkinter.END)
                    ekran[-1]['text'] = str(cos[:i] + '\u00D7' + cos[i+1]) + ' = ' + str(wynik)
                    pole_na_dane.insert(0, wynik + str('\u00F7'))
        elif symbol == 'CE':
            pole_na_dane.delete(0, tkinter.END)
        elif symbol == 'C':
            for i in range(1):
                ekran[i]['text'] = ''
                pole_na_dane.delete(0, tkinter.END)
        elif symbol == '\u00B1':
            if tekst.startswith('-'):
                pole_na_dane.delete(0, 1)
            else:
                pole_na_dane.insert(0, '-')
        elif symbol == '\u221A':
            try:
                cos = tekst
                tekst = float(pole_na_dane.get())
                tekst = math.sqrt(tekst)
                tekst = round(tekst, 5)
                pole_na_dane.delete(0, tkinter.END)
                pole_na_dane.insert(0, str(tekst))
                ekran[-1]['text'] = str('\u221A' + str(cos) + ' = ' + str(float(tekst)))
            except ValueError:
                pole_na_dane.delete(0, tkinter.END)
                text = pole_na_dane['text'] = 'Error'
                pole_na_dane.insert(tkinter.END, text)
        elif symbol == 'x\u00B2':
            try:
                cos = tekst
                tekst = float(pole_na_dane.get())
                tekst = math.pow(tekst, 2)
                pole_na_dane.delete(0, tkinter.END)
                pole_na_dane.insert(0, float(tekst))
                ekran[-1]['text'] = str(str(cos) + '\u00B2' + ' = ' + str(float(tekst)))
            except OverflowError:
                pole_na_dane.delete(0, tkinter.END)
                text = pole_na_dane['text'] = 'Przepełnienie'
                pole_na_dane.insert(tkinter.END, text)
            except ValueError:
                pole_na_dane.delete(0, tkinter.END)
                text = pole_na_dane['text'] = 'Error'
                pole_na_dane.insert(tkinter.END, text)
        else:
            tekst = symbol if symbol != 'x\u00B2' else '\u00B2'
            pole_na_dane.insert(tkinter.END, tekst)
    return f

def oblicz(pole_na_dane, ekran):
    def czyWielokrotneOperatory(tekst):
        for i in range(len(tekst)):
            if not tekst[i].isdigit() and not tekst[i + 1].isdigit():
                return True
        return False

    def zamienZnakPotegi(tekst):
        for i in range(len(tekst)):
            if tekst[i] == '\u00B2':
                tekst = tekst[:i] + '**' + tekst[i - 1]
        return tekst

    def zamienZnakMnozenia(tekst):
        for i in range(len(tekst)):
            if tekst[i] == '\u00D7':
                tekst = tekst[:i] + '*' + tekst[i + 1:]
          #  if '\u00D7' in tekst[i] and '\u00F7' in tekst[i]:


        return tekst

    def zamienZnakDzielenia(tekst):
        for i in range(len(tekst)):
            if tekst[i] == '\u00F7':
                tekst = tekst[:i] + '/' + tekst[i + 1:]
        return tekst


    def f():
        tekst = pole_na_dane.get()
        if not czyPoprawnyOstatniZnak(tekst) or czyWielokrotneOperatory(tekst) or pole_na_dane.get() == '':
            pole_na_dane.delete(0, tkinter.END)
            text = pole_na_dane['text'] = 'Error'
            pole_na_dane.insert(tkinter.END, text)

        else:

            for i in range(1, len(ekran)):
                if ekran[i]['text']:
                    ekran[i - 1]['text'] = ekran[i]['text']
            if '\u00B2' in tekst:
                wyrazenie = zamienZnakPotegi(tekst)
                ekran[-1]['text'] = tekst + ' = ' + str(eval(wyrazenie))
            if '\u00D7' in tekst:
                wyrazenie3 = zamienZnakMnozenia(tekst)
                ekran[-1]['text'] = tekst + ' = ' + str(eval(wyrazenie3))
          #  if '\u00B1' in tekst:
         #       zamienZnak(tekst)
          #      ekran[-1]['text'] = tekst
            if '\u00F7' in tekst:
                try:
                    wyrazenie4 = zamienZnakDzielenia(tekst)
                    ekran[-1]['text'] = tekst + ' = ' + str(eval(wyrazenie4))
                except:
                    pole_na_dane.delete(0, tkinter.END)
                    text = pole_na_dane['text'] = 'Error'
                    pole_na_dane.insert(tkinter.END, text)

        #    if '\u221A' in tekst:
           #       wyrazenie2 = zamienZnakPierwiastka(tekst)
            #      ekran[1]['text'] = tekst + ' = ' + str(eval(wyrazenie2))
            else:
                if '\u00D7' in tekst:
                    ekran[-1]['text'] = tekst + ' = ' + str(eval(tekst))
                else:
                    try:
                        ekran[-1]['text'] = tekst + ' = ' + str(eval(tekst))
                    except:
                        pole_na_dane.delete(0, tkinter.END)
                        text = pole_na_dane['text'] = 'Error'
                        pole_na_dane.insert(tkinter.END, text)


    return f


def podswietlenie(przyciski):
    def on_enter(event):
        event.widget['background'] = '#1d1f21'

    def on_leave(event):
        event.widget['background'] = '#222427'

    def cos(event):
        event.widget['background'] = '#18191c'

    def cos2(event):
        event.widget['background'] = '#1a1c1f'


    for i in przyciski:
        if i.cget('text') == '7' or i.cget('text') == '8' or i.cget('text') == '9' or i.cget('text') == '4' or i.cget('text') == '5'\
                or i.cget('text') == '6' or i.cget('text') == '1' or i.cget('text') == '2' or i.cget('text') == '3' or \
                i.cget('text') == '\u00B1' or i.cget('text') == '0' or i.cget('text') == '.':
            i.bind("<Enter>", cos)
            i.bind("<Leave>", cos2)
        else:
            i.bind("<Enter>", on_enter)
            i.bind("<Leave>", on_leave)


if __name__ == '__main__':
    root = inicjalizacjaOkienka()

    ekran = inicjalizacjaEkranu(root)

    pole_na_dane = inicjalizacjaPolaNaDane(root, ekran)

    przyciski = inicjalizacjaPrzycisków(root, ekran)

    podswietlenie = podswietlenie(przyciski)

    root.mainloop()