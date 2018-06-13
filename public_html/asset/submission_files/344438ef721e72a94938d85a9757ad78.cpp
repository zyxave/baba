#include <stdio.h>
#include <string.h>

int main () {
	int T; scanf("%d", &T);
	while (T--) {
		int N, bilmin, a[10005], total; scanf("%d", &N);
		bool habis[10005];
		memset(habis, false, sizeof habis);
		for (int i = 1; i <= N; i++) {
			scanf("%d", &a[i]);
			if (i == 1) bilmin = a[i];
			else {
				if (a[i] < bilmin) {
					bilmin = a[i];
				}
			}
		}
		total = N;
		while (total > 1) {
			for (int i = 1; i <= N; i++) {
				if (a[i] >= 0) {
					a[i] -= bilmin;
				} else {
					if (habis[i] == false) {
						habis[i] = true;
						total--;
					}
				}
			}	
		}
		if (total == 1) printf("Marlon\n");
		else printf("Nolram\n");		
	}
	return 0;
}
