#include <stdio.h>
#include <string.h>
#include <iostream>
using namespace std;

char kata[1005], hasil[1005];

int main () {
	int T, idx = 0;
	scanf("%d", &T);
	while (T--) {	
		strcpy(kata, "");
		strcpy(hasil, "");
		gets(kata);
		for (int i = 0; i <= strlen(kata)-1; i++) {
			if ('A' <= kata[i] && kata[i] <= 'Z' || 'a' <= kata[i] && kata[i] <= 'z') {
				if ('A' <= kata[i] && kata[i] <= 'Z' ) {
					if (i > 0) {
						hasil[idx] = '-';
						idx++;
					}
					hasil[idx] = kata[i] + ('a' - 'A'); //lowercase
					idx++;
				} else {
					hasil[idx] = kata[i];
					idx++;
				}
			} else  if (i < strlen(kata)-1 && 'A' <= kata[i+1] && kata[i+1] <= 'Z'){
				hasil[idx] = '-'; //selain huruf
			}
		}
		hasil[idx] = '\0';
		printf("%s\n", hasil);
	}
	return 0;
}
