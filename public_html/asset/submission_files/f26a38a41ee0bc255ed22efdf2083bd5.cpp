#include <cstdio>
#include <map>
#include <utility>
using namespace std;
map<pair<int, int>, int> cek;
map<pair<int, int>, int>::iterator it;
int main(){
	int testcase;
	int n;
	int a, b;
	pair <int, int> pasangan; 
	pair <int, int> per;
	scanf("%d", &testcase);
	for (int i=0; i<testcase; i++){
		scanf("%d", &n);
		cek.clear();
		for (int j=0; j<n; j++){
			scanf("%d %d", &a, &b);
			if (a != b){
				pasangan = make_pair(b, a);
				it = cek.find(pasangan);
				if (it == cek.end()){			//kalo gak ada pasangan
					per = make_pair(a, b);
					it = cek.find(per);
					if (it == cek.end()){ 	//kalo gak ada bikin baru
						cek[per] = 1;
					}
					else{					//kalo ada nambah
						cek[per]++;
					}
				}
				else {							//kalo ada pasangan
					if (cek[pasangan] == 1)		//kalo habis hapus
						cek.erase(it);
					else {
						cek[pasangan]--;
					}
				}
			}			
		}
		printf("%d\n", n-cek.size());
	}
	return 0;
}
