#include <cstdio>
#include <algorithm>

using namespace std;

int buku[10001];

int main(){

	int testcase;
	int n, total;

	scanf("%d", &testcase);

	for (int i=0; i<testcase; i++){
		scanf("%d %d", &n, &total);

		for (int j=0; j<n; j++){
			scanf("%d", &buku[j]);
		}

		sort(buku, buku+n);

		int kiri = 0;
		int kanan = n-1;
		int hitung = (kiri+kanan)/2;
		int batas = -1;
		while(kiri<=kanan){
			hitung = (kiri+kanan)/2;

			if ( (buku[hitung]>(total/2) ) ){
				kanan = hitung-1;
			}

			else if ((buku[hitung]<(total/2)) ){
				kiri = hitung+1;
				batas = hitung;
			}
			else{
				batas = hitung;
				break;
			}
		}

		if (batas>-1){
			bool ketemu = false;

			for (int j=batas; j>=0; j--){
				int cari = total-buku[j];

				kiri = j+1;
				kanan = n-1;
				hitung = (kiri+kanan)/2;
				while(kiri<=kanan){
					hitung = (kiri+kanan)/2;

					if (buku[hitung]>cari){
						kanan = hitung-1;
					}
					else if (buku[hitung]<cari){
						kiri = hitung+1;
					}

					else {
						ketemu = true;
						break;
					}
				}

				if (ketemu){
					printf("%d %d\n", i+1, buku[hitung]);
					break;
				}
			}

			if (!ketemu){
				printf("Billy rapopo\n");
			}
		}

		else {
			printf("Billy rapopo\n");
		}
	}

	return 0;
}