import webbrowser
import requests
from bs4 import BeautifulSoup
import time
MNUM = [1,2,3,4,5]
class CITY:
    Place = input("Enter the Name of City >> ")
def Music(Mood):
    if Mood == 1:
        print("Playing Chill Playlist")
        webbrowser.open("https://www.youtube.com/watch?v=D-YDEyuDxWU&list=PLgzTt0k8mXzEpH7-dOCHqRZOsakqXmzmG")
    if Mood == 2:
        print("Playing Party Playlist")
        webbrowser.open("https://www.youtube.com/watch?v=ru0K8uYEZWw&list=PLWlTX25IDqIwqowTsJmGhqxUWU_6qgG1W")
    if Mood == 3:
        print("Playing Study Playlist")
        webbrowser.open("https://www.youtube.com/watch?v=bIB8EWqCPrQ&list=PLgR8f2XNozvwrdKzxL_XyEjXFRJlo-Tyt")
    if Mood == 4:
        print("Playing Workout Playlist")
        webbrowser.open("https://www.youtube.com/watch?v=311ZcJozOhI&list=PLu0ocO48LFms5WsI1ipaeanxqRjn2fC_5")
    if Mood == 5:
        print("Playing Old School Playlist")
        webbrowser.open("https://www.youtube.com/watch?v=5qm8PH4xAss&list=PLnfcpZm6el8gpyIi4gP-vk5kQ4J9NY55e")
    if Mood not in MNUM:
        print("You Didn't Choose Any Playlist")


headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'}


def weather(city):
    city = city.replace(" ", "+")
    res = requests.get(
        f'https://www.google.com/search?q={city}&oq={city}&aqs=chrome.0.35i39l2j0l4j46j69i60.6128j1j7&sourceid=chrome&ie=UTF-8',
        headers=headers)
    print("Searching...\n")
    soup = BeautifulSoup(res.text, 'html.parser')
    location = soup.select('#wob_loc')[0].getText().strip()
    time = soup.select('#wob_dts')[0].getText().strip()
    info = soup.select('#wob_dc')[0].getText().strip()
    weather = soup.select('#wob_tm')[0].getText().strip()
    print(location)
    print(time)
    print(info)
    print(weather + "°C")
print("Lets Check The Weather >>")
time.sleep(1)

city = CITY.Place + " weather"
weather(city)
time.sleep(1)
print("\n")

print("What's Your Mood? \n")
Mood = int(input("[1]Chill/[2]Party/[3]Study/[4]Workout/[5]Old School or Choose Any Other Number To Skip >>"))
Music(Mood)
