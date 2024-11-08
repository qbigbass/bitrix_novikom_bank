import depositData from './deposit.json';
export async function fetchDepositCalcData(url) {
  const response = await fetch(url);

  if (response.ok) {
    return response.json();
  } else {
    return depositData;
  }
}
