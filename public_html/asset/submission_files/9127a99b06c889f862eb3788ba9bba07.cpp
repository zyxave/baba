#include <stdio.h>
#include <string.h>

int main () {
	int T; scanf("%d", &T);
	while (T--) {
		int a, b, total = 0;
		bool sudah[10005], lanjut = true;
		memset(sudah, false, sizeof sudah);
		scanf("%d %d", &a, &b);
		for (int i = a; i <= b; i++) {
			int N = i;
			memset(sudah, false, sizeof sudah);
			lanjut = true;
			while (lanjut == true && N > 0) {
				if (sudah[N % 10] == true) {
					lanjut = false;
				} else  {
					sudah[N % 10] = true;
					N /= 10;	
				}
			}
			if (lanjut == true) total++;
		}
		printf("%d\n", total);
	}
	return 0;
}
