#include<stdio.h>
#include<math.h>
using namespace std;
int main ()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		int n;
		scanf("%d",&n);
		int arr[n];
		for(int a=0;a<n;a++)
			scanf("%d",&arr[a]);
		int banyak=0;
		int banyak2=0;
		long long hasil=0;
		for(int a=0;a<n;a++)
		{
			banyak+=arr[a];
			banyak2+=arr[n-a-1];
			long long lol=pow(2,a);
			long long loll=lol%1000000007;
			hasil=(hasil+loll*(banyak2-banyak))%1000000007;
		}
		printf("%lld\n",hasil);		
	}
	return 0;
}
