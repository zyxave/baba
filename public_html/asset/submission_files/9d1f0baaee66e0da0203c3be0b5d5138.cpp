#include <stdio.h>
#include <math.h>
using namespace std;

int main () {
	int t;
	scanf ("%d", &t);
	for (int a=1;a<=t;a++) {
		int p, q;
		scanf ("%d %d", &p, &q);
		int arr[q+1];
		for (int b=0;b<q+1;b++) {
			int kombinasi = 1;
			for (int m=1; m<=b;m++) {
				kombinasi = kombinasi *(q-m+1)/m;
			}
			int koef = kombinasi * pow (p,b);
			int pangkat = q-b;
			if (b==q) {
				printf ("%d\n", koef);
			}
			else {
				if (koef == 1) {
					printf ("x");
					printf ("%d ", pangkat); }
				else if (pangkat == 1) {
					printf ("%d", koef);
					printf ("x "); }
				else {				
					printf ("%d", koef);
					printf ("x");
					printf ("%d ", pangkat); }
			}
		}
	}
	return 0;
}
