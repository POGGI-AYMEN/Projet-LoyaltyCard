prog: main.o
	gcc -o prog main.o -lcurl `pkg-config --libs --cflags gtk+-3.0`

main.o:
	gcc -o main.o -c main.c -lcurl `pkg-config --libs --cflags gtk+-3.0`

clean:
	rm -rf *.o
